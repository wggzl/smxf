<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="_token" content="{{csrf_token()}}">
        <meta name="description" content="">
        <title>后台管理 | @section('title') @show</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/common.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('notie/dist/notie.min.css')}}">

         @section('style')
         @show
</head>

<body>
            <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand">后台管理</div>
                </div>
    
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="house.php" class="dropdown-toggle" data-toggle="dropdown">
                                学校管理 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{url('admin/school/create')}}">学校添加</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/school')}}">学校一览</a>
                                </li>
                            </ul>
                        </li>
                     
                         <li class="dropdown">
                            <a href="news.php" class="dropdown-toggle" data-toggle="dropdown">
                                学生管理 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{url('admin/student/create')}}">学生添加 </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/student')}}">学生一览</a>
                                </li>
                            </ul>
                        </li>
                         <li class="dropdown">
                            <a href="news.php" class="dropdown-toggle" data-toggle="dropdown">
                                商品管理 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{url('admin/goods/create')}}">商品添加 </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/goods')}}">商品一览</a>
                                </li>
                            </ul>
                        </li>
                         <li class="dropdown">
                            <a href="news.php" class="dropdown-toggle" data-toggle="dropdown">
                                订单管理 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <!-- <li>
                                    <a href="#">订单添加 </a>
                                </li> -->
                                <li>
                                    <a href="{{url('admin/order')}}">订单一览</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">注销</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <script type="text/javascript" src="{{asset('notie/dist/notie.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/layer/layer.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/common.js')}}"></script>
        @section('script')
        @show
</body>
</html>