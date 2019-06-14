<div class="mega-menu">
                <div class="container">
                    <div class="mega-wrap">
                        <div class="row">
                            <div class="col-md-3 vertical-menu @if(Route::currentRouteName()=='site.home') active @endif">
                                <h3>
                                    Our Categories
                                </h3>
                                <div class="menu-toggle">
                                        Close Menu
                                </div>
                                <ul class="menu-cont">
                                    @foreach($categories as $cat)
                                    <li>
                                        <a href="{{ route('site.category' , ['id' => $cat->cat_id]) }}">
                                            <img src="{{asset('storage/uploads/categories').'/'.$cat->icon}}">
                                            {{$cat->cat_name_en}}
                                        </a>                                        
                                        @if($cat->parent == 1)                         
                                        <ul class="menu-item-cont">
                                            @foreach($subs as $s)
                                            @if($s->cate_id == $cat->cat_id)
                                            <li><a href="{{ route('site.sub' , ['id' => $s->sub_id]) }}">{{$s->sub_name_en}}</a></li>
                                             @endif
                                            @endforeach
                                        </ul><!--End menu-item-cont-->
                                        @endif
                                    </li>
                                    @endforeach
                                </ul><!--End vertical-menu-cont-->  
                            </div><!--End col-md-3-->
                            <div class="col-md-9">
                                <ul class="horizontalmenu-cont">
                                    <li>
                                        <a href="{{URL::to('/')}}">
                                            <i class="fa fa-home"></i>
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('/about')}}">
                                            <i class="fa fa-info"></i>
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('/products')}}">
                                            <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                                            Products
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('/blog')}}">
                                            <i class="fa fa-newspaper-o"></i>
                                            Blog
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('/contact')}}">
                                            <i class="fa fa-envelope-o"></i>
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>    
                            </div><!--End col-md-9-->
                        </div>
                    </div><!--End Row-->
                </div><!--End container-->
            </div><!--End mega-menu--> 