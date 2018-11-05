;$(document).ready(function(){
	//登录验证
	$(".btn-lg").on("click", function() {
            $(".error").html("");

            if($("#sch_name").val() == "") {
                $(".error").eq(0).html("请输入学校名称！");
                return false;
            }

            if($("#stu_grade").val() == "") {
                $(".error").eq(1).html("请选择年级！");
                return false;
            }
            
            if($("#stu_num").val() == "") {
                $(".error").eq(2).html("请输入学号！");
                return false;
            }
            
            if($("#stu_name").val() == "") {
                $(".error").eq(3).html("请输入姓名！");
                return false;
            }
            
            var _url = $('#login-form').attr('action');
            var _data = $('#login-form').serialize();
            _ajax(_url, _data);
            return false;
        });
});