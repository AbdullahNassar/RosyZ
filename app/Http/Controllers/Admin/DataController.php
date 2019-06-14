<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Data;
use DB;

class DataController extends Controller {

	public function getData()
    {
        $statics = DB::table('statics')
            ->select('statics.*')
            ->where('id','=', 1)
            ->get();
        return view('admin.pages.data', compact('statics'));
    }


    public function updateData(Request $request)
    {

        $v = validator($request->all() ,[
            'b1_head_ar' => 'required',
            'b1_head_en' => 'required',
            'b1_content_ar' => 'required',
            'b1_content_en' => 'required',
            'b2_head_ar' => 'required',
            'b2_head_en' => 'required',
            'b2_content_ar' => 'required',
            'b2_content_en' => 'required',
            'b3_head_ar' => 'required',
            'b3_head_en' => 'required',
            'b3_content_ar' => 'required',
            'b3_content_en' => 'required',
            'about_ar' => 'required',
            'about_en' => 'required',
            'goal_ar' => 'required',
            'goal_en' => 'required',
            'message_ar' => 'required',
            'message_en' => 'required',
            'vision_ar' => 'required',
            'vision_en' => 'required',
            'news_ar' => 'required',
            'news_en' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'b1_head_ar.required' => 'Please insert Block 1 Header in Arabic',
            'b1_head_en.required' => 'Please insert Block 1 Header in English',
            'b1_content_ar.required' => 'Please insert Block 1 Content in Arabic',
            'b1_content_en.required' => 'Please insert Block 1 Content in English',
            'b2_head_ar.required' => 'Please insert Block 2 Header in Arabic',
            'b2_head_en.required' => 'Please insert Block 2 Header in English',
            'b2_content_ar.required' => 'Please insert Block 2 Content in Arabic',
            'b2_content_en.required' => 'Please insert Block 2 Content in English',
            'b3_head_ar.required' => 'Please insert Block 3 Header in Arabic',
            'b3_head_en.required' => 'Please insert Block 3 Header in Arabic',
            'b3_content_ar.required' => 'Please insert Block 3 Content in Arabic',
            'b3_content_en.required' => 'Please insert Block 3 Content in English',
            'about_ar.required' => 'Please insert About Content in Arabic',
            'about_en.required' => 'Please insert About Content in English',
            'goal_ar.required' => 'Please insert Our Goal in Arabic',
            'goal_en.required' => 'Please insert Our Goal in English',
            'message_ar.required' => 'Please insert Our Message in Arabic',
            'message_en.required' => 'Please insert Our Message in English',
            'vision_ar.required' => 'Please insert Our Vision in Arabic',
            'vision_en.required' => 'Please insert Our Vision in English',
            'news_ar.required' => 'Please insert News Letter in Arabic',
            'news_en.required' => 'Please insert News Letter in English',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        for ($i=1; $i <= 5 ; $i++) { 
            $feature_ar['f_ar'.$i] = $request->input('f_ar'.$i);
        }
        $features_ar = json_encode($feature_ar);
        for ($i=1; $i <= 5 ; $i++) { 
            $feature_en['f_en'.$i] = $request->input('f_en'.$i);
        }
        $features_en = json_encode($feature_en);

        $b1_head_ar = $request->input('b1_head_ar');
        $b1_head_en = $request->input('b1_head_en');
        $b1_content_ar = $request->input('b1_content_ar');
        $b1_content_en = $request->input('b1_content_en');
        $b2_head_ar = $request->input('b2_head_ar');
        $b2_head_en = $request->input('b2_head_en');
        $b2_content_ar = $request->input('b2_content_ar');
        $b2_content_en = $request->input('b2_content_en');
        $b3_head_ar = $request->input('b3_head_ar');
        $b3_head_en = $request->input('b3_head_en');
        $b3_content_ar = $request->input('b3_content_ar');
        $b3_content_en = $request->input('b3_content_en');
        $about_ar = $request->input('about_ar');
        $about_en = $request->input('about_en');
        $goal_ar = $request->input('goal_ar');
        $goal_en = $request->input('goal_en');
        $message_ar = $request->input('message_ar');
        $message_en = $request->input('message_en');
        $vision_ar = $request->input('vision_ar');
        $vision_en = $request->input('vision_en');
        $news_ar = $request->input('news_ar');
        $news_en = $request->input('news_en');

        $data = array( 'b1_head_ar' => $b1_head_ar ,
         'b1_head_en' => $b1_head_en, 'b1_content_ar' => $b1_content_ar,
         'b1_content_en' => $b1_content_en, 'b2_head_ar' => $b2_head_ar,
         'b2_head_en' => $b2_head_en,'b2_content_ar' => $b2_content_ar,
         'b2_content_en' => $b2_content_en, 'b3_head_ar' => $b3_head_ar,
         'b3_head_en' => $b3_head_en, 'b3_content_ar' => $b3_content_ar,
         'b3_content_en' => $b3_content_en, 'about_ar' => $about_ar,
         'about_en' => $about_en, 'features_ar' => $features_ar,
         'features_en' => $features_en, 'goal_ar' => $goal_ar,
         'goal_en' => $goal_en, 'message_ar' => $message_ar,
         'message_en' => $message_en, 'vision_ar' => $vision_ar,
         'vision_en' => $vision_en, 'news_ar' => $news_ar,
         'news_en' => $news_en);
        
        $d = DB::table('statics')->where('id', 1)->update($data);
        
            if ($d){
                return ['status' => 'succes' ,'data' => 'Data is updated successfully'];
            }
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }
}
