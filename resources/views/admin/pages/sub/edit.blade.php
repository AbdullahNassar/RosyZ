@extends('admin.layouts.master')
@section('title')
Admin Panel
@endsection
@section('content')
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">

                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="{{route('admin.home')}}">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Sub Categories</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Edit Sub Category 
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    @foreach($subs as $sub)
                                    <form action="{{ route('admin.sub.edit' , ['id' => $sub->sub_id]) }}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                                        <div class="form-body">
                                            {{ csrf_field() }}
                                            <div class="col-md-6" style="margin-bottom: 20px; margin-top: 40px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Activation :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-gift"></i>
                                                        </span>
                                                        <input type="hidden" name="s_id" value="{{ $sub->sub_id }}">
                                                        <select class="form-control" name="active">
                                                                <option selected value="{{ $sub->active }}">@if($sub->active == 1)
                                                                                Active
                                                                @elseif($sub->active == 0)
                                                                                Not Active
                                                                @endif 
                                                                </option>
                                                                <option value="1">Active</option>
                                                                <option value="0">Not Active</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px; margin-top: 40px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Category :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <select class="form-control" name="cat_id" required>
                                                                <option value="{{$sub->cate_id}}">{{ $sub->cat_name_en }}
                                                                </option>
                                                                @foreach($categories as $category)
                                                                <option value="{{$category->cat_id}}">{{$category->cat_name_en}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 50px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Sub Category Name in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input value="{{ $sub->sub_name_ar }}" type="text" name="sub_name_ar" class="form-control" placeholder="Sub Category Name in Arabic..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 50px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Sub Category Name in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input value="{{ $sub->sub_name_en }}" type="text" name="sub_name_en" class="form-control" placeholder="Sub Category Name in English..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-5 col-md-7">
                                                    <button type="submit" class="btn green addBTN">Submit</button>
                                                    <a href="{{route('admin.subs')}}" type="button" class="btn  grey-salsa btn-outline">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endforeach
                                    <!-- END FORM-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md-12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endsection