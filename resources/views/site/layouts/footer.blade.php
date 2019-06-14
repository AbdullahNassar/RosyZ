<footer class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <ul class="site-map">
                                    <li><a href="{{URL::to('/about')}}">About Rosys</a></li>
                                    @if (Auth::guard('members')->check())
                                    <li><a href="{{route('site.profile')}}">My Account</a></li>
                                    @endif
                                    <li><a href="{{URL::to('/blog')}}">Academy</a></li>
                                    <li><a href="{{URL::to('/contact')}}">Get Support</a></li>
                                    <li><a href="{{URL::to('/about')}}">Terms and Conditions</a></li>
                                </ul><!--End site-map-->
                            </div><!--End col-md-8-->
                            <div class="col-md-4">
                                <ul class="social-list">
                                    <li>
                                        <a href="{{$contact->get('youtube')}}">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$contact->get('linkedin')}}">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$contact->get('instagram')}}">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$contact->get('pin')}}">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$contact->get('twitter')}}">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$contact->get('facebook')}}">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                </ul><!--End social-list-->
                            </div><!--End col-md-4-->
                        </div><!--End row-->
                        <div class="row">
                            <div class="copyrights">
                                <div class="col-md-8">
                                    <div class="copyright-wrap">
                                        made with 
                                        <i class="fa fa-heart"></i> 
                                        By Upureka
                                    </div><!--End site-map-->
                                </div><!--End col-md-8-->
                                <div class="col-md-4">
                                    <div class="copyright-wrap text-right"> 
                                        © 2016 Rosyz
                                    </div><!--End site-map-->
                                </div><!--End col-md-4-->
                            </div><!--copyrights-->    
                        </div><!--End row-->
                    </div><!--End container-->
                </footer>   