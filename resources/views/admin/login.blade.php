<!DOCTYPE html>
<html>
<head>
            <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <title>后台管理 | 登录</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/common.css')}}">
            
        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/common.js')}}"></script>
</head>

<body>
    <div class="container">
      <form id="login-form" class="form-signin" method="post" action="login.php">
        <h2 class="form-signin-heading">后台管理登录</h2>
        <label for="name" class="">账号：</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="账号" required="" autofocus="">
        <label for="password" class="">密码：</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="密码" required="">
        <p class="error"></p>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
      </form>
    </div>
  
  <script>
    $(document).ready(function() {
        $(".btn-lg").on("click", function() {
            $(".error").val("");
            
            if($("#name").val() == "") {
                $(".error").html("请输入账号！");
                return false;
            }
            
            if($("#password").val() == "") {
                $(".error").html("请输入密码！");
                return false;
            }
            
            $("#login-form").submit();
        });
    });
    
  </script>
  
</body>
</html>