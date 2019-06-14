@extends('site.layouts.master')
@section('content')  
@foreach($product as $p)
                <div class="container page-heading">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.home')}}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>
                            Product Details
                        </li>
                    </ul>
                </div><!--End Container-->
                <div class="page-content">
                    <section class="section-30">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="product-show-wrapper">
                                        <div class="general-img">
                                            <img id="show-product" src="{{asset('storage/uploads/products').'/'.$p->image}}" data-zoom-image="{{asset('storage/uploads/products').'/'.$p->image}}"> 
                                        </div><!--general-img-->
                                        <div class="thumblist-box">
                                            <a href="#" class="btn prev">
                                                <i class="fa fa-arrow-left"></i>
                                            </a>
                                            <a href="#" class="btn next">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                            <div id="show-product-gal"> 
                                                @foreach($g_images as $g)
                                                <a href="#" data-image="{{asset($g->image)}}" data-zoom-image="{{asset($g->image)}}">
                                                    <img alt="" src="{{asset($g->image)}}">
                                                </a>
                                                @endforeach
                                            </div><!--End show-product-gal-->
                                        </div><!--End thumblist-box-->
                                    </div><!--End product-show-wrapperr-->
                                </div><!--End col-md-4--> 
                                <div class="col-sm-7 col-md-5">
                                    <div class="product-information">
                                        <h2 class="product-title">
                                            {{$p->name_en}}
                                        </h2>
                                        <div class="reviews-box">  
                                            <ul class="rating">
                                                @for ($i = 1; $i <= $p->rate; $i++)
                                                    <li class="active"></li>
                                                @endfor
                                            </ul>
                                            <a href="#reviews" class="add-review">
                                                Add your review
                                            </a>
                                        </div><!--End reviews-box-->
                                        <div class="price-box">
                                            <s class="price-old">${{$p->price}}</s>
                                            <span class="price">${{$p->sale_price}}</span>
                                        </div><!--End price-box-->
                                        <form action="{{ route('wishlist.add' , ['id' => $p->p_id]) }}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                            {{ csrf_field() }}
                                            <button type="submit" class="custom-btn addBTN">
                                                Add To Wishlist
                                            </button>
                                        </form>
                                        <div class="product-share">
                                            <ul class="social-list">
                                                <li>
                                                    <a href="">
                                                        <i class="fa fa-rss"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!--End product-share-->
                                    </div><!--End product-information-->
                                </div><!--End col-sm-7 col-md-5-->
                                
                                <div class="col-sm-5 col-md-3">
                                    <ul class="product-inform-box">
                                        <li>
                                            <span>Category:</span>
                                            @if($p->sub_name_en)
                                            <h5>{{$p->sub_name_en}}</h5>
                                            @else
                                            <h5>{{$p->cat_name_en}}</h5>
                                            @endif
                                        </li>
                                        <li>
                                            <span>Shop Owner:</span>
                                            <a href="{{route('profile.public' , ['id' => $p->owner_id])}}">
                                                {{$p->name}}
                                            </a>
                                        </li>
                                        <li>
                                            <span>Availability:</span>
                                            @if($p->quantity > 0)
                                            <h5 class="availabel">
                                                In Stock
                                            </h5>
                                            @else
                                            <h5 class="not-availabel">
                                                Out Of Stock
                                            </h5>
                                            @endif
                                        </li>
                                        <li>
                                            <span>Discount:</span>
                                            @if($p->on_sale == 1)
                                            <h5 class="availabel">Yes</h5>
                                            @else
                                            <h5 class="not-availabel">No</h5>
                                            @endif
                                        </li>
                                        @if (Auth::guard('members')->check())
                                        <li class="contact-awner">
                                            <a href="" data-toggle="modal" data-target="#myModal">
                                                <i class="fa fa-envelope-o"></i>
                                                Contact Owner
                                            </a>
                                        </li> 
                                        @endif  
                                    </ul><!--End product-inform-box-->
                                </div><!--End col-sm-5 col-md-3-->
                            </div><!--End Row-->
                            <div class="spacer-60 clearfix"></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="tab-wrapper">
                                        <ul class="tab">
                                            <li>
                                                <a href="#reviews">Reviews</a>
                                            </li>
                                            <li>
                                                <a href="#description">Description</a>
                                            </li>
                                        </ul><!--End tab-->
                                        <div class="tab-content"> 
                                            <div id="reviews" class="tab-panel"> 
                                                <ul class="all-reviews">
                                                    @foreach($reviews as $r)
                                                    <li class="one-review">
                                                        <ul class="review-rates">
                                                            <li>
                                                                <span>
                                                                    Price
                                                                </span>
                                                                <ul class="rating">
                                                                    @for ($i = 1; $i <= $r->price; $i++)
                                                                        <li class="active"></li>
                                                                    @endfor
                                                                </ul>
                                                            </li><!--price-->
                                                            <li>
                                                                <span>
                                                                    Quality
                                                                </span>
                                                                <ul class="rating">
                                                                    @for ($i = 1; $i <= $r->quality; $i++)
                                                                        <li class="active"></li>
                                                                    @endfor
                                                                </ul>

                                                            </li><!--Quality-->
                                                            <li>
                                                                <span>
                                                                    Value
                                                                </span>
                                                                <ul class="rating">
                                                                    @for ($i = 1; $i <= $r->value; $i++)
                                                                        <li class="active"></li>
                                                                    @endfor
                                                                </ul>

                                                            </li><!--Value-->
								
                                                        </ul><!--review-rates-->

                                                        <div class="review-body">

                                                            <div class="review-meta">
															
                                                                <h3>
                                                                    {{$r->summary}}
                                                                </h3>

                                                                Review by 
                                                                <a href="{route('site.profile')}}">{{$r->name}}</a> on {{$r->created_at}}

                                                            </div>

                                                            <p>{{$r->review}}</p>

                                                        </div><!--review-body-->
                                                    </li><!--End one-review-->
                                                    @endforeach
                                                </ul><!--End reviews-->
                                                <form action="{{route('product.review')}}" enctype="multipart/form-data" method="post" onsubmit="return false;" class="review-form">
                                                    {{ csrf_field() }}
                                                    <input name="id" type="hidden" value="{{$p->p_id}}">
                                                    <input name="m_id" type="hidden" value="{{$p->id}}">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <table class="table-rate">
                                                            <thead>
                                                                <tr>	
																<th></th>
																<th>1 Star</th>
																<th>2 Stars</th>
																<th>3 Stars</th>
																<th>4 Stars</th>
																<th>5 Stars</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Price</td>
                                                                    <td>	
                                                                        <input checked="" name="price" id="rate1" type="radio" value="1">
                                                                        <label for="rate1"></label>
                                                                    </td>
                                                                    <td>	
                                                                        <input name="price" id="rate2" type="radio" value="2">
                                                                        <label for="rate2"></label>
                                                                    </td>
                                                                    <td>	
                                                                        <input name="price" id="rate3" type="radio" value="3">
                                                                        <label for="rate3"></label>
                                                                    </td>
                                                                    <td>	
                                                                        <input name="price" id="rate4" type="radio" value="4">
                                                                        <label for="rate4"></label>
                                                                    </td>
                                                                    <td>	
                                                                        <input name="price" id="rate5" type="radio" value="5">
                                                                        <label for="rate5"></label>
                                                                    </td>
                                                                </tr>
                                                                <tr> 
                                                                    <td>
                                                                        Value
                                                                    </td>
                                                                    <td>
                                                                        <input checked="" name="value" id="rate6" type="radio" value="1">
                                                                        <label for="rate6"></label>
                                                                    </td>
                                                                    <td>
                                                                        <input name="value" id="rate7" type="radio" value="2">
                                                                        <label for="rate7"></label>
                                                                    </td>
                                                                    <td>
                                                                        <input name="value" id="rate8" type="radio" value="3">
                                                                        <label for="rate8"></label>
                                                                    </td>
                                                                    <td>
                                                                        <input name="value" id="rate9" type="radio" value="4">
                                                                        <label for="rate9"></label>
                                                                    </td>
                                                                    <td>
                                                                        <input name="value" id="rate10" type="radio" value="5">
                                                                        <label for="rate10"></label>
                                                                    </td>
                                                                </tr>
                                                                <tr> 
                                                                    <td>
                                                                        Quality
                                                                    </td>
                                                                    <td>
                                                                        <input checked="" name="quality" id="rate11" type="radio" value="1">
                                                                        <label for="rate11"></label>
                                                                    </td>
                                                                    <td>
                                                                        <input name="quality" id="rate12" type="radio" value="2">
                                                                        <label for="rate12"></label>
                                                                    </td>
                                                                    <td>
                                                                        <input name="quality" id="rate13" type="radio" value="3">
                                                                        <label for="rate13"></label>
                                                                    </td>
                                                                    <td>
                                                                        <input name="quality" id="rate14" type="radio" value="4">
                                                                        <label for="rate14"></label>
                                                                    </td>
                                                                    <td>
                                                                        <input name="quality" id="rate15" type="radio" value="5">
                                                                        <label for="rate15"></label>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div><!--end col-md-6-->
                                                    <div class="col-md-7">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <input name="summary" type="text" placeholder="Summary of Review">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <textarea rows="4" name="review" placeholder="your review"></textarea>
                                                                </div>
                                                            </div><!--Row-->

                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <button type="submit" class="custom-btn btn addBTN">Submit Review</button>
                                                                </div>
                                                            </div><!--Row-->
                                                        </div><!--End col-md-6-->
                                                    </div><!--End Row--> 
                                                </form>
                                            </div><!--End tab-panel-->
                                            <div id="description" class="tab-panel description"> 
                                                <p> {{$p->content_en}}
                                                </p>
                                            </div><!--End description tab-panel--> 
                                        </div><!--End tab-content-->       
                                    </div><!--End tab-wrapper-->
                                </div><!--End Col-Sm-12-->
                            </div><!--End Row-->
                        </div><!--End Container-->
                    </section><!---->
                </div><!--End page-content-->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Contact Owner</h4>
                      </div>
                      <div class="modal-body">
                          <form action="{{route('owner.message')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                            {{ csrf_field() }}
                              <div class="row">
                                  <div class="col-md-6 form-group">
                                      <label>Your Name</label>
                                      <input name="member_id" class="form-control" value="{{$p->owner_id}}" type="hidden">
                                      <input name="name" class="form-control" placeholder="enter your name" type="text">
                                  </div><!--End col-md-6-->
                                  <div class="col-md-6 form-group">
                                      <label>Your Email</label>
                                      <input name="email" class="form-control" placeholder="enter your Email" type="email">
                                  </div><!--End col-md-6-->
                                  <div class="col-md-6 form-group">
                                      <label>Your Mobile</label>
                                      <input name="phone" class="form-control" placeholder="enter Your mobile" type="text">
                                  </div><!--End col-md-6-->
                                  <div class="col-md-6 form-group">
                                      <label>Your Address</label>
                                      <input name="address" class="form-control" placeholder="enter Your address" type="text">
                                  </div><!--End col-md-6-->
                                  <div class="col-md-12 form-group">
                                      <label>Message</label>
                                      <textarea name="message" class="form-control" type="text" placeholder="enter your message" rows="6"></textarea>
                                  </div><!--End col-md-12-->       
                              </div><!--End row-->
                              <button type="submit" class="custom-btn addBTN">Contact Owner</button>
                          </form>
                      </div><!--End Modal-body-->
                    </div>
                  </div>
                </div><!--End modal-->
@endforeach
@endsection