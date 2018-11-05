<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="_token" content="{{csrf_token()}}">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <title>学生 | 登录</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/common.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('notie/dist/notie.min.css')}}">

         

</head>

<body>
    <div class="container">
      <form id="login-form" class="form-signin" method="post" action="{{url('login')}}">
        <input type="hidden" value="" name="school_id" id="school_id" />
        <h2 class="form-signin-heading">学生登录</h2>
        <label for="name" class="">学校：</label>
        <input type="text" id="sch_name" class="form-control" placeholder="学校" required="" autofocus="">
        <p class="error"></p>
        <label for="stu_grade" class="">年级：</label>
        <select class="form-control" id="stu_grade" name="stu_grade">
            <option value="">请选择分类</option>
        </select>
        <p class="error"></p>
        <label for="stu_num" class="">学号：</label>
        <input type="text" id="stu_num" name="stu_num" class="form-control" placeholder="学号" required="">
        <p class="error"></p>
        <label for="stu_name" class="">姓名：</label>
        <input type="text" id="stu_name" name="stu_name" class="form-control" placeholder="姓名" required="">
        <p class="error"></p>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
      </form>
    </div>
    <script type="text/javascript" src="{{asset('notie/dist/notie.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
       
        
        <script type="text/javascript" src="{{asset('js/layer/layer.js')}}"></script>

        <script type="text/javascript" src="{{asset('js/jquery-ui/jquery-ui.min.js')}}"></script>

        <link rel="stylesheet" type="text/css" href="{{asset('js/jquery-ui/jquery-ui.min.css')}}">

        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/common.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/login.js')}}"></script>
  <script>
    ;$(document).ready(function() {
        var queryNamesByKeys = {!! $sch_arr[0] !!};
        var queryGradesBynm  = {!! $sch_arr[1] !!};
        $('#sch_name').autocomplete({
            source: function(request, response){
                var matcher = new RegExp( $.ui.autocomplete.escapeRegex( request.term ), "i" );
                var filter = [];
                for(var arg in queryNamesByKeys)
                {
                    if(matcher.test(queryNamesByKeys[arg]['key'])){
                        filter.push(queryNamesByKeys[arg]['nm']);
                    }
                }
                if(filter.length < 1){
                     filter = ['查无此校'];  
                }
                response(filter);
            },
            select: function(event, ui){
                $('#stu_grade > option:gt(0)').remove();
                for(var arg in queryGradesBynm)
                {
                    if(ui.item.value == queryGradesBynm[arg]['key']){
                        $('#school_id').val(queryGradesBynm[arg]['sid']);
                        $('#stu_grade').append(queryGradesBynm[arg]['value']);break;
                    }
                }
            }

        });

        
    });
    
  </script>

</body>
</html>