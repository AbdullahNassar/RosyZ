<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorie;
use App\Storie;
use App\Product;
use App\Data;
use App\Contact;
use App\Sub;
use Auth;
use DB;

class ProductController extends Controller {

    public function getIndex(){

        $categories = Categorie::all();
        $subs = Sub::all();
        $stories = Storie::all();
        $on_sale_products = Product::get()->where('on_sale','=', 1);
        $latest_products = Product::get()->where('latest','=', 1);
        $top_rated_products = Product::get()->where('top_rated','=', 1);
        $sidebar = DB::table('ads')->select('ads.image')->where('id', '=', 1)->get();
        $data = new Data;
        $contact = new Contact;
        $products = Product::get();

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            return view('site.pages.products', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','products','sidebar'));
        }

        return view('site.pages.products', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact','products','sidebar'));
    }

    public function getCat($id){

        $categories = Categorie::all();
        $subs = Sub::all();
        $stories = Storie::all();
        $on_sale_products = Product::get()->where('on_sale','=', 1);
        $latest_products = Product::get()->where('latest','=', 1);
        $top_rated_products = Product::get()->where('top_rated','=', 1);
        $data = new Data;
        $contact = new Contact;
        $sidebar = DB::table('ads')->select('ads.image')->where('id', '=', 1)->get();
        $products = DB::table('products')
                ->join('categories','products.category_id','=','categories.cat_id')
                ->select('products.*','categories.cat_name_en')
                ->where('products.category_id','=', $id)
                ->get();

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            return view('site.pages.products', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','products','sidebar'));
        }

        return view('site.pages.products', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact','products','sidebar'));
    }
    public function getSub($id){

        $categories = Categorie::all();
        $subs = Sub::all();
        $stories = Storie::all();
        $on_sale_products = Product::get()->where('on_sale','=', 1);
        $latest_products = Product::get()->where('latest','=', 1);
        $top_rated_products = Product::get()->where('top_rated','=', 1);
        $data = new Data;
        $contact = new Contact;
        $sidebar = DB::table('ads')->select('ads.image')->where('id', '=', 1)->get();
        $products = DB::table('products')
                ->join('subs','products.subc_id','=','subs.sub_id')
                ->select('products.*','subs.sub_name_en')
                ->where('products.subc_id','=', $id)
                ->get();

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            return view('site.pages.products', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','products','sidebar'));
        }

        return view('site.pages.products', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact','products','sidebar'));
    }

    public function getProduct($id){

        $categories = Categorie::all();
        $subs = Sub::all();
        $stories = Storie::all();
        $on_sale_products = Product::get()->where('on_sale','=', 1);
        $latest_products = Product::get()->where('latest','=', 1);
        $top_rated_products = Product::get()->where('top_rated','=', 1);
        $data = new Data;
        $contact = new Contact;
        $product = DB::table('products')
                ->join('categories','products.category_id','=','categories.cat_id')
                ->join('subs','products.subc_id','=','subs.sub_id')
                ->join('members','members.id','=','products.owner_id')
                ->select('products.*','members.name','members.id','categories.cat_name_en','subs.sub_name_en')
                ->where('products.p_id','=', $id)
                ->get();
        $g_images = DB::table('productimages')
            ->select('productimages.*')
            ->where('product_id','=', $id)
            ->get();

        $reviews = DB::table('reviews')
            ->join('members','members.id','=','reviews.owner_id')
            ->select('reviews.*','members.name')
            ->where('product_id','=', $id)
            ->get();

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            return view('site.pages.product', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','product','g_images','reviews'));
        }

        return view('site.pages.product', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact','product','g_images','reviews'));
    }

    public function search(Request $request){

        $category = $request->input('category');
        $search = $request->input('search');

        $categories = Categorie::all();
        $subs = Sub::all();
        $stories = Storie::all();
        $on_sale_products = Product::get()->where('on_sale','=', 1);
        $latest_products = Product::get()->where('latest','=', 1);
        $top_rated_products = Product::get()->where('top_rated','=', 1);
        $data = new Data;
        $contact = new Contact;
        $sidebar = DB::table('ads')->select('ads.image')->where('id', '=', 1)->get();
        $products = DB::table('products')
                ->join('categories','products.category_id','=','categories.cat_id')
                ->join('subs','products.subc_id','=','subs.sub_id')
                ->join('members','members.id','=','products.owner_id')
                ->select('products.*')
                ->where('products.category_id', '=', $category)
                ->where('products.name_en', 'like', '%' . $search . '%')
                ->orWhere('products.content_en', 'like', '%' . $search . '%')
                ->get();

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            return view('site.pages.products', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','products','sidebar'));
        }

        return view('site.pages.products', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact','products','sidebar'));
    }

    public function review(Request $request)
    {
        $v = validator($request->all() ,[
            'summary' => 'required',
            'review' => 'required'
        ] ,[
            'summary.required' => 'Please Enter Summary',
            'review.required' => 'Please Enter Review'
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        if($member = Auth::guard('members')->check()){
            $summary = $request->input('summary');
            $review = $request->input('review');
            $price = $request->input('price');
            $quality = $request->input('quality');
            $value = $request->input('value');
            $product_id = $request->input('id');
            $m_id = $request->input('m_id');

            $data = array(
                'price'=>$price,
                'quality'=>$quality,
                'value'=>$value,
                'product_id'=>$product_id,
                'owner_id'=>$m_id,
                'summary'=>$summary,
                'review'=>$review
            );

            $U = DB::table('reviews')->insert($data);

            if ($U){
                return ['status' => 'succes' ,'data' => 'Thanks for your time'];
            }
            return ['status' => 'error' ,'data' => 'Something went wrong , please try again'];
        }
        return ['status' => false ,'data' => 'Please Login First'];
    }

    public function getAdd(){

        $categories = Categorie::all();
        $subs = Sub::all();
        $stories = Storie::all();
        $on_sale_products = Product::get()->where('on_sale','=', 1);
        $latest_products = Product::get()->where('latest','=', 1);
        $top_rated_products = Product::get()->where('top_rated','=', 1);
        $data = new Data;
        $contact = new Contact;
        $products = Product::get();

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            return view('site.pages.add', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','products'));
        }

        return view('site.pages.add', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact','products'));
    }

    public function insert(Request $request,$id) {
        $v = validator($request->all() ,[
            'name_ar' => 'required',
            'name_en' => 'required',
            'price' => 'required',
            'sale_price' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'content_ar' => 'required',
            'content_en' => 'required',
            'on_sale' => 'required',
            'quantity' => 'required',
            'cat_id' => 'required',
            'sub_id' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'name_ar.required' => 'Please insert Product Name in Arabic',
            'name_en.required' => 'Please insert Product Name in English',
            'content_ar.required' => 'Please insert Product Description in Arabic',
            'content_en.required' => 'Please insert Product Description in English',
            'price.required' => 'Please insert Product Price',
            'quantity.required' => 'Please insert Product Quantity',
            'cat_id.required' => 'Please insert Product Category',
            'sub_id.required' => 'Please insert Product Sub Category'
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $name_ar = $request->input('name_ar');
        $name_en = $request->input('name_en');
        $price = $request->input('price');
        $sale_price = $request->input('sale_price');
        $image = $request->input('image');
        $content_ar = $request->input('content_ar');
        $content_en = $request->input('content_en');
        $on_sale = $request->input('on_sale');
        $quantity = $request->input('quantity');
        $cat_id = $request->input('cat_id');
        $sub_id = $request->input('sub_id');

        $data = array('name_ar' => $name_ar ,'name_en' => $name_en ,
            'price' => $price,'sale_price' => $sale_price,
            'image' => $image ,'content_ar' => $content_ar ,'content_en' => $content_en ,
            'on_sale' => $on_sale ,'quantity' => $quantity ,'owner_id' => $id ,
            'category_id' => $cat_id ,'subc_id' => $sub_id );
        $product = Product::create($data);

        if ($product){
            return ['status' => 'succes' ,'data' => 'Product has been added successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }
}
