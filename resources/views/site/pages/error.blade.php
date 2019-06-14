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
                            Error
                        </li>
                    </ul>
                </div><!--End Container-->
                <div class="page-content">
                    <div class="container">
                        <div class="item-box padding-30">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <h1 style="font-size: xx-large; text-align: center;" class="head-border">Error 404 Not Found</h1>
                                </div><!--End col-md-6-->
                            </div><!--End row-->
                        </div><!--End item-box-->
                    </div><!--End Container-->
                </div><!--End page-content-->
@endsection