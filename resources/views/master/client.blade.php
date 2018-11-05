
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>学生 | @section('title') @show</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <meta name="_token" content="{{ csrf_token() }}"/>
  <link rel="alternate icon" type="image/png" href="">
  <link rel="stylesheet" href="{{url('amazeui/css/amazeui.min.css')}}">
  <link rel="stylesheet" href="{{url('amazeui/css/app.css')}}">
  <link rel="stylesheet" href="{{url('css/common.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('notie/dist/notie.min.css')}}">
    @section('style')
    @show
</head>
<body>

        @yield('content')
      <script type="text/javascript" src="{{asset('notie/dist/notie.min.js')}}"></script>
      <script src="{{url('amazeui/js/jquery.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/layer/layer.js')}}"></script>
      <script src="{{url('amazeui/js/amazeui.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/common.js')}}"></script>
      <script src="{{url('js/jquery.cookie.js')}}"></script>
      <script src="{{url('js/client.js')}}"></script>
        @section('script')
        @show
</body>
</html>