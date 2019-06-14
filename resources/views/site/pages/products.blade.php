@extends('site.layouts.master')
@section('content')            
                <div class="container page-heading">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.home')}}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>
                            Products
                        </li>
                    </ul>
                </div><!--End Container-->
                <div class="page-content section-lg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="item-box">
                                    <h3 class="head-border">On Sale Products</h3>
                                    <div class="widgets_carousel">
                                        @foreach($on_sale_products as $p)
                                        <div class="item">
                                            <a class="product-side" href="{{ route('site.product' , ['id' => $p->p_id]) }}">
                                                <div class="product-image">
                                                    <img src="{{asset('storage/uploads/products').'/'.$p->image}}" class="item-img">    
                                                </div><!--End product-image-->
                                                <div class="product-side-con">
                                                    <div class="product-name">
                                                        {{$p->name_en}}  
                                                    </div>
                                                    <ul class="rating">
                                                        @for ($i = 1; $i <= $p->rate; $i++)
                                                        <li class="active"></li>
                                                        @endfor
                                                    </ul><!--End rating-->
                                                    <div class="price-box">
                                                        <s class="price-old">${{$p->price}}</s>
                                                        <span class="price">${{$p->sale_price}}</span>
                                                    </div><!--End price-box-->
                                                </div><!--End product-side-con-->
                                            </a><!--End product-side-->
                                        </div><!--End Item--> 
                                        @endforeach
                                    </div><!--End widgets_carousel-->    
                                </div><!--End item-box-->
                                <div class="item-box no-padding">
                                    @foreach($sidebar as $s)
                                    <img src="{{asset('assets/site/images/banners').'/'.$s->image}}">
                                    @endforeach
                                </div><!--End item-box-->
                                <div class="item-box">
                                    <h3 class="head-border">Product tags</h3>
                                    <ul class="tag-list">   
                                        @foreach($categories as $cat)
                                        <li><a href="{{ route('site.category' , ['id' => $cat->cat_id]) }}">{{$cat->cat_name_en}}</a></li>
                                        @endforeach
                                    </ul><!--End tag-list-->
                                </div><!--End item-box-->
                                <div class="item-box">
                                    <h3 class="head-border">Top Rated Products</h3>
                                    <div class="widgets_carousel">
                                        @foreach($top_rated_products as $pr)
                                        <div class="item">
                                            <div class="product-side">
                                                <div class="product-image">
                                                    <img src="{{asset('storage/uploads/products').'/'.$pr->image}}" class="item-img">    
                                                </div><!--End product-image-->
                                                <div class="product-side-con">
                                                    <a class="product-name" href="{{ route('site.product' , ['id' => $pr->p_id]) }}">
                                                        {{$pr->name_en}}       
                                                    </a>
                                                    <div class="rate-price">
                                                        <span class="price">$100</span><br>
                                                        <ul class="rating">
                                                            @for ($i = 1; $i <= $pr->rate; $i++)
                                                            <li class="active"></li>
                                                            @endfor
                                                        </ul><!--End rating-->
                                                    </div><!--End rate-price-->
                                                </div><!--End product-side-con-->
                                            </div><!--End product-side-->
                                        </div><!--End Item-->
                                        @endforeach
                                    </div><!--End widgets_carousel-->    
                                </div><!--End item-box-->
                                <div class="item-box">
                                    <h3 class="head-border">Newsletters</h3>
                                    <p>Sing up to our newsletter and get exclusive deals you wont find any- where else straight to your inbox!</p>
                                    <form class="subscribe-form" enctype="multipart/form-data" method="post" onsubmit="return false;" action="{{URL::to('/subscribe')}}">
                                        {{ csrf_field() }}
                                        <input name="subscribe" placeholder="Enter Your Email Address" type="text">
                                        <button type="submit" class="addBTN">
                                            <i class="fa fa-paper-plane"></i>
                                        </button>
                                    </form>
                                </div><!--End item-box-->
                                <div class="item-box">
                                    <h3 class="head-border">Testimonials</h3>
                                    <div class="widgets_carousel">
                                        @foreach($stories as $story)
                                        <blockquote class="testimonial-side">
                                            <h3>
                                                {{$story->title_en}}
                                            </h3>
                                            <p>
                                                {{$story->story_en}}
                                            </p>
                                        </blockquote>
                                        @endforeach
                                    </div><!--/ .widgets_carousel-->
                                </div><!--End item-box-->
                            </div><!--End col-md-3-->
                            <div class="col-md-9">
                                <div class="item-box no-border no-margin">
                                    <div class="row">
                                        @foreach($products as $p)
                                        <div class="col-md-4">
                                            <div class="cat-item">
                                                <a class="cat-img" href="{{ route('site.product' , ['id' => $p->p_id]) }}">
                                                    <img src="{{asset('storage/uploads/products').'/'.$p->image}}">
                                                </a><!--End cat-img-->
                                                <div class="cat-cont">
                                                    <div class="cat-front">
                                                        <h2>
                                                            {{$p->name_en}}
                                                        </h2>
                                                        <ul class="rating">
                                                            @for ($i = 1; $i <= $p->rate; $i++)
                                                                <li class="active"></li>
                                                            @endfor
                                                        </ul>
                                                        <div class="price-box">
                                                            <s class="price-old">${{$p->price}}</s>
                                                            <span class="price">${{$p->sale_price}}</span>
                                                        </div><!--End price-box-->
                                                    </div><!--End cat front-->
                                                    <div class="cat-back">
                                                        <form action="{{ route('wishlist.add' , ['id' => $p->p_id]) }}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="custom-btn addBTN">
                                                                    Add To Wishlist
                                                            </button>
                                                        </form>
                                                    </div><!--End cat back-->
                                                </div><!--End cat-cont-->
                                            </div><!--cat item-->
                                        </div><!--End col-md-4-->
                                        @endforeach
                                    </div><!--End row-->
                                </div><!--End item-box-->                                
                            </div><!--End col-md-9-->
                        </div><!--End row-->
                    </div><!--End container-->
                </div><!--End page-content-->
@endsection