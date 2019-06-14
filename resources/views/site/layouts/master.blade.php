<!DOCTYPE html>
<html>
    <head>
        <!-- Basic page needs
        ===========================-->
        <title>RosyZ</title>
        <meta charset="utf-8">
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="keywords" content=""> 
        <meta name="csrf_token" content="{{csrf_token()}}">       
        
        <!-- Mobile specific metas
        ===========================-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- Favicon
        ===========================-->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/site/images/icons/fav.png')}}">
        
        <!-- Google Web Fonts 
        ===========================-->        
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet"> 
        
        <!-- Css Base And Vendor 
        ===========================-->
        <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/font-awesome/css/font-awesome.css')}}">
      
        <!-- Site Style
        ===========================-->
        <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
         
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="wrapper">
            @include('site.layouts.header')

            @include('site.layouts.mega')
            <div class="main" role="main">
            @yield('content')
            @include('site.layouts.footer')
            </div><!--End main-->
        </div><!-- End Wrapper -->
        @yield('modals')
        @yield('templates')
        <!-- common edit modal with ajax for all project -->
                <div id="common-modal" class="modal fade" role="dialog">
                    <!-- modal -->
                </div>

                <!-- delete with ajax for all project -->
                <div id="delete-modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                    </div>
                </div>
                <script id="template-modal" type="text/html" >
                    <div class = "modal-content" >
                        <input type = "hidden" name = "_token" value="{{ csrf_token() }}" >
                        <div class = "modal-header" >
                            <button type = "button" class = "close" data - dismiss = "modal" > &times; </button>
                            <h4 class = "modal-title bold" >Delete item?</h4>
                        </div>
                        <div class = "modal-body" >
                            <p >Are you sure?</p>
                        </div>
                        <div class = "modal-footer" >
                            <a
                                href = "{url}"
                                id = "delete" class = "btn btn-danger" >
                                <li class = "fa fa-trash" > </li> Delete
                            </a>

                            <button type = "button" class = "btn btn-warning" data-dismiss = "modal" >
                                <li class = "fa fa-times" > </li> Cancel</button >
                        </div>
                    </div>
                </script>
                
                @include('site.templates.alerts')
                @include('site.templates.delete-modal')

                <form action="#" id="csrf">{!! csrf_field() !!}</form>

        <!--Scripts Plugins-->
        
        <script src="{{asset('assets/admin/jquery.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('assets/site/js/new.js')}}" ></script>
</script>


    </body>
</html>