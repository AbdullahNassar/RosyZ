@extends('site.layouts.master')
@section('content')            
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-offset-3">
                            <div id="home-slider" class="home-slider carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($sliders as $s)
                                    <li data-target="#home-slider" data-slide-to="{{$loop->index}}" class="@if($loop->index==0) active @endif"></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    @foreach($sliders as $slider)
                                    <div class="item @if($loop->index==0) active @endif">
                                        <img src="{{asset('storage/uploads/sliders').'/'.$slider->image}}">
                                    </div>
                                    @endforeach
                                </div>
                            </div><!--End home-slider-->
                            <div class="slider-text">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>{{$data->get('b1_head_en')}}</h4>
                                        <p>{{$data->get('b1_content_en')}}</p>
                                    </div><!--End col-md-4-->
                                    <div class="col-md-4">
                                        <h4>{{$data->get('b2_head_en')}}</h4>
                                        <p>{{$data->get('b2_content_en')}}</p>
                                    </div><!--End col-md-4-->
                                    <div class="col-md-4">
                                        <h4>{{$data->get('b2_head_en')}}</h4>
                                        <p>{{$data->get('b2_content_en')}}</p>
                                    </div><!--End col-md-4-->
                                </div><!--End Row -->
                            </div><!--End slider-text-->
                        </div><!--End col-md-9-->
                    </div><!--End row-->
                </div><!--End container-->
                <div class="page-content">
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
                                                        <span class="price">${{$pr->price}}</span><br>
                                                        <ul class="rating">
                                                        @for ($i = 1; $i <= $pr->rate; $i++)
                                                            <li class="active"></li>
                                                        @endfor
                                                        </ul><!--End rating-->
                                                    </div><!--End rate-price-->
                                                </div><!--End product-side-con-->
                                            </div><!--End product-side-->
                                        </div>
                                        @endforeach
                                    </div><!--End widgets_carousel-->    
                                </div><!--End item-box-->
                                <div class="item-box">
                                    <h3 class="head-border">Newsletters</h3>
                                    <p>{{$data->get('news_en')}}</p>
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
                                <div class="item-box">
                                    <h3 class="head-border">Latest Products</h3>
                                    <div class="widgets_carousel block-item">
                                    @foreach($latest_products as $pro)
                                        <div class="cat-item">
                                            <a class="cat-img" href="{{ route('site.product' , ['id' => $pro->p_id]) }}">
                                                <img src="{{asset('storage/uploads/products').'/'.$pro->image}}"> 
                                            </a><!--End cat-img-->
                                            <div class="cat-cont">
                                                <div class="cat-front">
                                                    <h2>
                                                        {{$pro->name_en}}   
                                                    </h2>
                                                    <ul class="rating">
                                                        @for ($i = 1; $i <= $pro->rate; $i++)
                                                            <li class="active"></li>
                                                        @endfor
                                                    </ul>
                                                    <div class="price">
                                                        ${{$pro->price}}
                                                    </div>
                                                </div><!--End cat front-->
                                                <div class="cat-back">
                                                    <form action="{{ route('wishlist.add' , ['id' => $pro->p_id]) }}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="custom-btn addBTN">
                                                                Add To Wishlist
                                                        </button>
                                                    </form>
                                                </div><!--End cat back-->
                                            </div><!--End cat-cont-->
                                        </div><!--cat item-->
                                        @endforeach
                                    </div><!--End widgets_carousel-->    
                                </div><!--End item-box-->
                                <div class="item-box no-padding">
                                    @foreach($center as $c)
                                    <img src="{{asset('assets/site/images/banners').'/'.$c->image}}">
                                    @endforeach
                                </div><!--End item-box-->
                                <div class="item-box">
                                    <h3 class="head-border">On Sale Products</h3>
                                    <div class="widgets_carousel block-item">
                                    @foreach($on_sale_products as $prod)
                                        <div class="cat-item">
                                            <a class="cat-img" href="{{ route('site.product' , ['id' => $prod->p_id]) }}">
                                                <img src="{{asset('storage/uploads/products').'/'.$prod->image}}"> 
                                            </a><!--End cat-img-->
                                            <div class="cat-cont">
                                                <div class="cat-front">
                                                    <h2>
                                                        {{$prod->name_en}}   
                                                    </h2>
                                                    <ul class="rating">
                                                        @for ($i = 1; $i <= $prod->rate; $i++)
                                                            <li class="active"></li>
                                                        @endfor
                                                    </ul>
                                                    <div class="price-box">
                                                        <s class="price-old">${{$prod->price}}</s>
                                                        <span class="price">${{$prod->sale_price}}</span>
                                                    </div>
                                                </div><!--End cat front-->
                                                <div class="cat-back">
                                                    <form action="{{ route('wishlist.add' , ['id' => $prod->p_id]) }}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="custom-btn addBTN">
                                                                Add To Wishlist
                                                        </button>
                                                    </form>
                                                </div><!--End cat back-->
                                            </div><!--End cat-cont-->
                                        </div><!--cat item-->
                                        @endforeach
                                    </div><!--End widgets_carousel-->    
                                </div><!--End item-box-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="item-box no-padding">
                                            @foreach($left as $l)
                                            <img src="{{asset('assets/site/images/banners').'/'.$l->image}}">
                                            @endforeach
                                        </div><!--End item-box-->
                                    </div><!--End col-md-6-->
                                    <div class="col-md-6">
                                        <div class="item-box no-padding">
                                            @foreach($right as $r)
                                            <img src="{{asset('assets/site/images/banners').'/'.$r->image}}">
                                            @endforeach
                                        </div><!--End item-box-->
                                    </div><!--End col-md-6-->
                                </div><!--End Row-->
                                <div class="item-box">
                                    <h3 class="head-border">Top Rated Products</h3>
                                    <div class="widgets_carousel block-item">
                                    @foreach($top_rated_products as $produ)
                                        <div class="cat-item">
                                            <a class="cat-img" href="{{ route('site.product' , ['id' => $produ->p_id]) }}">
                                                <img src="{{asset('storage/uploads/products').'/'.$produ->image}}"> 
                                            </a><!--End cat-img-->
                                            <div class="cat-cont">
                                                <div class="cat-front">
                                                    <h2>
                                                        {{$produ->name_en}}   
                                                    </h2>
                                                    <ul class="rating">
                                                        @for ($i = 1; $i <= $produ->rate; $i++)
                                                            <li class="active"></li>
                                                        @endfor
                                                    </ul>
                                                    <div class="price">
                                                        ${{$produ->price}}
                                                    </div>
                                                </div><!--End cat front-->
                                                <div class="cat-back">
                                                    <form action="{{ route('wishlist.add' , ['id' => $produ->p_id]) }}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="custom-btn addBTN">
                                                                Add To Wishlist
                                                        </button>
                                                    </form>
                                                </div><!--End cat back-->
                                            </div><!--End cat-cont-->
                                        </div><!--cat item-->
                                        @endforeach
                                    </div><!--End widgets_carousel-->    
                                </div><!--End item-box--> 
                            </div><!--End col-md-9-->        
                        </div><!--End row-->
                    </div><!--End container-->
                </div><!--End page-content-->
@endsection