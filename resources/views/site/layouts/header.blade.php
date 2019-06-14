<div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-9 col-sm-8">
                            <div class="login-register">
                                <span class="hidden-sm hidden-xs">
                                    Welcome 
                                    @if (Auth::guard('members')->check())
                                    <strong class="hidden-sm hidden-xs">
                                        {{Auth::guard('members')->user()->name}} 
                                    </strong>
                                    @else 
                                    Visitor
                                    @endif
                                    you can
                                </span>
                                @if (Auth::guard('members')->check())
                                <a href="{{route('site.logout')}}">
                                    Logout
                                </a>
                                @else
                                <a class="popup-text" href="#login-dialog" data-effect="mfp-move-from-top">
                                    Login
                                </a>
                                or
                                <a class="popup-text" href="#register-dialog" data-effect="mfp-move-from-top">
                                    Sign Up
                                </a>
                                @endif
                            </div><!--End login-register-->
                        </div><!--End col-sm-6-->
                        <div class="col-xs-3 col-sm-4">
                            <div class="navbar top-navbar top-navbar-right" role="navigation">
                                <button type="button" class="navbar-toggle btn-navbar collapsed" data-toggle="collapse" data-target=".top-navbar .navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <nav class="collapse collapsing navbar-collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <a href="">
                                                Arabic
                                            </a>
                                        </li>
                                        @if (Auth::guard('members')->check())
                                        <li>
                                            <a href="{{route('site.profile')}}">My Account</a>
                                        </li>
                                        <li class="hidden-md hidden-lg">
                                            <a href="">My Wishlist</a>
                                        </li>
                                        @else
                                        <li class="hidden-md hidden-lg">
                                            <a href="{{route('site.login')}}">My Wishlist</a>
                                        </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div><!--End top-navbar--> 
                        </div><!--End col-sm-6-->
                    </div><!--End row-->
                </div><!--End container-->      
            </div><!--End header-top-->  
            <div id="login-dialog" class="mfp-with-anim mfp-hide mfp-dialog">
                <div class="login-register-head">
                    <h3>Log In</h3>
                     <a class="popup-text" href="#register-dialog" data-effect="mfp-zoom-out">
                         register
                    </a>
                </div><!--End login-register-head-->
                <form class="dialog-form" action="{{route('site.login')}}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>UserName</label>
                        <input class="form-control" name="username" placeholder="Enter your UserName..." type="text">
                    </div><!--End col-md-6-->
                    
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" placeholder="Enter Password..." type="password">
                    </div><!--End form-group-->
                    <button type="submit" class="custom-btn addBTN">Login</button>
                    <a class="popup-text dialog-txt" href="#password-recover-dialog" data-effect="mfp-zoom-out">
                        forget password?
                    </a>
                </form><!--End dialog-form-->
            </div><!--End login-dialog-->
            <div id="register-dialog" class="mfp-with-anim mfp-hide mfp-dialog dialog-box">
                <form class="dialog-form" action="{{route('site.register')}}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Your Name</label>
                        <input class="form-control" placeholder="Enter your Name..." name="name" type="text">
                    </div><!--End form-group-->
                    <div class="form-group">
                        <label>Your UserName</label>
                        <input class="form-control" placeholder="Enter your UserName..." name="username" type="text">
                    </div><!--End form-group-->
                    <div class="form-group">
                        <label>Member Type</label>
                        <select class="form-control" name="type">
                            <option>Select Type...</option>
                            <option value="owner">Owner</option>
                            <option value="member">Member</option>
                        </select>
                    </div><!--End form-group-->
                    <div class="form-group">
                        <label for="register-email">Your Email</label>
                        <input id="register-email" class="form-control" name="email" placeholder="enter your name" type="email">
                    </div><!--End form-group-->
                    <div class="form-group">
                        <label for="register-password">Your Password</label>
                        <input id="register-password" class="form-control" name="password1" placeholder="Enter your Password" type="password">
                    </div><!--End form-group-->
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input id="confirm-password" class="form-control" name="password2" placeholder="Confirm your Password" type="password">
                    </div><!--End form-group-->
                    <div class="form-group">
                        <label for="register-country">Your Phone</label>
                        <input id="register-country" class="form-control" name="phone" placeholder="enter your phone" type="text">
                    </div><!--End form-group-->
                    <button type="submit" class="custom-btn addButton">Register</button>
                </form>
                <p class="dont-have alrady-member">
                    <a class="popup-text dialog-txt" href="#login-dialog" data-effect="mfp-zoom-out">Already member</a>
                </p> 
            </div><!--End dialog-box-->
            <div id="password-recover-dialog" class="mfp-with-anim mfp-hide mfp-dialog dialog-box">
                <form class="dialog-form" action="{{route('password.get')}}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="reset-pass">Dont Worry About Password</label>
                        <input name="email" placeholder="Enter Your email address" type="email" class="form-control">
                    </div><!--End form-group-->
                    <button type="submit" class="custom-btn addBTN">
                        Request new password
                    </button>
                </form>
            </div><!-- END dialog-box --> 
            <div class="main-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{URL::to('/')}}" class="logo">
                                <img src="{{asset('assets/site/images/logo.png')}}">
                            </a>
                        </div><!--End col-md-3-->  
                        <div class="col-md-6">
                            <form class="head-search" method="GET" action="{{route('product.search')}}">
                                <select id="discuss" name="category" class="categories-filter">
                                    @foreach($categories as $cat)
                                    <option value="{{$cat->cat_id}}">
                                        {{$cat->cat_name_en}}
                                    </option>
                                    @endforeach
                                </select>
                                <input name="search" class="search-input" placeholder="Search here...">
                                <button class="search-button" type="submit"></button>    
                            </form><!--End search-area-->
                        </div><!--End col-md-7-->  
                        @if (Auth::guard('members')->check())
                        <div class="col-md-3 hidden-xs hidden-sm">
                            <a href="{{ route('site.wishlist' , ['id' => Auth::guard('members')->user()->id]) }}" class="wish-btn">
                                <div class="wish-btn-icon">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="wish-btn-count">
                                    {{$count}}
                                </div>
                                <div class="wish-btn-txt">
                                    wishlist
                                </div>
                            </a><!--End wish-btn-->
                        </div><!--End col-md-2-->
                        @else
                        <div class="col-md-3 hidden-xs hidden-sm">
                            <a href="{{route('site.login')}}" class="wish-btn">
                                <div class="wish-btn-icon">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="wish-btn-count">
                                    0
                                </div>
                                <div class="wish-btn-txt">
                                    Wishlist
                                </div>
                            </a><!--End wish-btn-->
                        </div><!--End col-md-2-->
                        @endif
                        <div class="menu-toggle">
                            menu toggle
                        </div>
                    </div><!--End row-->
                </div><!--End container-->   
            </div><!--End main-header-->