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
                            Verify Your Phone
                        </li>
                    </ul>
                </div><!--End Container-->
                <div class="page-content">
                    <div class="container">
                        <div class="item-box padding-30">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <h3 class="head-border">Verify Phone</h3>
                                    <form action="{{route('phone.verify')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                        <div class="form-group">
                                            <label>Enter Verification</label>
                                            <input name="code" class="form-control" placeholder="Enter Your Code" type="text">
                                        </div><!--End col-md-6-->
                                        <button type="submit" class="custom-btn addBTN">Verify</button>
                                    </form>
                                </div><!--End col-md-6-->
                            </div><!--End row-->
                        </div><!--End item-box-->
                    </div><!--End Container-->
                </div><!--End page-content-->
@endsection