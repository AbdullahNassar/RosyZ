<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorie;
use App\Slider;
use App\Storie;
use App\Product;
use App\Subscriber;
use App\Data;
use App\Contact;
use App\Sub; 
use App\Ad; 
use Auth;
use DB;

class HomeController extends Controller
{
    public function getIndex(){

    	$categories = Categorie::all();
    	$subs = Sub::all();
    	$sliders = Slider::all();
    	$stories = Storie::all();
    	$on_sale_products = Product::get()->where('on_sale','=', 1);
    	$latest_products = Product::get()->where('latest','=', 1);
    	$top_rated_products = Product::get()->where('top_rated','=', 1);
    	$data = new Data;
        $contact = new Contact;
        $sidebar = DB::table('ads')->select('ads.image')->where('id', '=', 1)->get();
        $center = Ad::get()->where('id', '=', 2);
        $left = Ad::get()->where('id', '=', 3);
        $right = Ad::get()->where('id', '=', 4);

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            return view('site.pages.home', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','sidebar','center','left','right'));
        }

        return view('site.pages.home', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact','sidebar','center','right','left'));
    }

    public function getAbout(){

        $categories = Categorie::all();
        $subs = Sub::all();
        $sliders = Slider::all();
        $stories = Storie::all();
        $on_sale_products = Product::get()->where('on_sale','=', 1);
        $latest_products = Product::get()->where('latest','=', 1);
        $top_rated_products = Product::get()->where('top_rated','=', 1);
        $data = new Data;
        $contact = new Contact;

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            return view('site.pages.about', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact'));
        }

        return view('site.pages.about', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact'));
    }

    public function subscribe(Request $request)
    {
        $v = validator($request->all() ,[
            'subscribe' => 'required|email|unique:subscribers,email',
        ] ,[
            'subscribe.required' => 'Please Enter Your E-mail Address',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $subscribe = $request->input('subscribe');
        $data = array('email'=>$subscribe);
        $subscriber = Subscriber::create($data); 
        if ($subscriber){
            return ['status' => 'succes' ,'data' => 'You Subscribed Successfully'];
        }
        return ['status' => 'error' ,'data' => 'Something went wrong , please try again'];
    }
}
