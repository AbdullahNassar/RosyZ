@extends('site.layouts.master')
@section('content')            
                <div class="container page-heading">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.home')}}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                    </ul>
                </div><!--End Container-->
                <div class="page-content">
                    <div class="container">
                        <div class="item-box padding-30">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="head-border">Sign in</h3>
                                    <p class="section-txt">Hello, Welcome to your account.</p>
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
                                </div><!--End col-md-6-->
                                <div class="col-md-6">
                                    <h3 class="head-border">Create a new account</h3>
                                    <p class="section-txt">Create your new account.</p>
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
                                    <button type="submit" class="custom-btn addBTN">Register</button>
                                </form>
                                </div><!--End col-md-6-->
                            </div><!--End row-->
                        </div><!--End item-box-->
                        
                    </div><!--End Container-->
                    
                </div><!--End page-content-->
@endsection