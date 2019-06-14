<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use App\Categorie;
use App\Storie;
use App\Product;
use App\Data;
use App\Contact;
use Config;
use App\Sub;
use Auth;
use DB;

class ProfileController extends Controller
{

    public function getIndex($id) {
        $products =  DB::table('products')
                ->join('members','members.id','=','products.owner_id')
                ->select('products.*')
                ->where('products.owner_id','=', $id)
                ->get();

        $owner = DB::table('members')
                ->select('members.*')
                ->where('members.id','=', $id)
                ->get();
        $categories = Categorie::all();
        $subs = Sub::all();
        $stories = Storie::all();
        $data = new Data;
        $contact = new Contact;

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            return view('site.pages.profile', compact('products','categories','subs','latest_products','data','stories','count','contact','owner'));
        }

        return view('site.pages.profile', compact('categories','subs','latest_products','data','stories','contact','owner','products'));

    }
}
