<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sub;
use App\Categorie;
use DB;

class SubsController extends Controller
{
    public function getIndex() {
    	$subs = DB::table('subs')
                ->join('categories','subs.cate_id','=','categories.cat_id')
                ->select('subs.*','categories.*')
                ->get();
        return view('admin.pages.sub.index', compact('subs'));
    }

    public function getAdd() {
        $categories = Categorie::all();
        return view('admin.pages.sub.add', compact('categories'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'sub_name_ar' => 'required',
            'sub_name_en' => 'required',
            'active' => 'required',
            'cat_id' => 'required'
        ] ,[
            'sub_name_ar.required' => 'Please insert Sub Category Name in Arabic',
            'sub_name_en.required' => 'Please insert Sub Category Name in English',
            'cat_id.required' => 'Please Select Category'
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

    	$sub_name_ar = $request->input('sub_name_ar');
        $sub_name_en = $request->input('sub_name_en');
    	$active = $request->input('active');
        $cat_id = $request->input('cat_id');
    	$data = array('sub_name_ar' => $sub_name_ar ,'sub_name_en' => $sub_name_en ,'active' => $active,'cate_id' => $cat_id);
    	$sub = Sub::create($data);
        $record = array('parent' => 1);
        DB::table('categories')->where('cat_id','=', $cat_id)->update($record);

        if ($sub){
            return ['status' => 'succes' ,'data' => 'Data is inserted successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

    public function getEdit($id) {
    	if (isset($id)) {
	        $subs = DB::table('subs')
                ->join('categories','subs.cate_id','=','categories.cat_id')
                ->select('subs.*','categories.*')
                ->where('subs.sub_id','=', $id)
                ->get();
            $categories = Categorie::all();
	        return view('admin.pages.sub.edit', compact('subs','categories'));
        }        
    }

    public function postEdit(Request $request) {
    	$v = validator($request->all() ,[
            'sub_name_ar' => 'required',
            'sub_name_en' => 'required',
            'active' => 'required',
            'cat_id' => 'required'
        ] ,[
            'sub_name_ar.required' => 'Please insert Sub Category Name in Arabic',
            'sub_name_en.required' => 'Please insert Sub Category Name in English',
            'cat_id.required' => 'Please Select Category'
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $id = $request->input('s_id');        
        $sub_name_ar = $request->input('sub_name_ar');
        $sub_name_en = $request->input('sub_name_en');
        $active = $request->input('active');
        $cat_id = $request->input('cat_id');
        $data = array('sub_name_ar' => $sub_name_ar ,'sub_name_en' => $sub_name_en ,'active' => $active,'cate_id' => $cat_id);
    	$sub = DB::table('subs')->where('sub_id','=', $id)->update($data);

    	if ($sub){
            return ['status' => 'succes' ,'data' => 'Data is updated successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

    public function delete($id) {
    	if (isset($id)) {
	    	DB::table('subs')->where('sub_id','=', $id)->delete();
	    	$subs = DB::table('subs')
                ->join('categories','subs.cate_id','=','categories.cat_id')
                ->select('subs.*','categories.*')
                ->get();
            return view('admin.pages.sub.index', compact('subs'));
	    }
    }

}
