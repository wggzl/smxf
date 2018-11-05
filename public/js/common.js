

$(function() {
	//搜索按钮
	$(".search").on("click", function() {
		$("#condition-form").submit();
	});
	
	//删除按钮
	$(".del").on("click", function() {

		var del_url = $(this).attr('href');

		layer.open({
			shade: false,
			content: '确定删除？',
			btn: ['确定', '取消'],
			yes: function(index){
				var loading = layer.load(0, {shade: false}); 
				_ajax(del_url, {'_method':'DELETE'});
				layer.close(index);
			}
		});
		
		return false;
	});
	
	//选择图片并上传
	$(".upload-img").on("change", function() {
		var $img_name = $(this).siblings(".img-name");
		var $img_preview = $(this).siblings(".img-preview");
		var post_url = $('#upload-url').val();
		
		var formData = new FormData();
		formData.append('file', $(this)[0].files[0]);
		
		$.ajax({
		    url: post_url,
		    type: 'POST',
		    cache: false,
		    data: formData,
		    processData: false,
		    headers:{ 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
		    contentType: false,
		    dataType: "json"
		}).done(function(res) {
			if(res.error_code === 0){
				var imgname = res.message;
				$img_name.val(imgname);
				if($img_preview.length>0 || res.full_path)$img_preview.attr('src', res.full_path);
			} else {
				layer.msg(res.message,{icon:3,anim:6});
			}
		}).fail(function(res) {
			console.log(res);
		});
	});
	
	//提交表单
	$(".submit").on("click", function() {
		//判断必选项是否都填写			
		// if(!checkNull()) return false;
		var _url = $('#form').attr('action');
		var _data = $('#form').serialize();
		_ajax(_url, _data);
	});
});


function _ajax(_url, _data, _type, _dataType){
	if(_type == undefined || _type == '')_type = 'post';
	if(_dataType == undefined || _dataType == '')_dataType = 'json';
	$.ajax({
			url:_url,
			data:_data,
			type:_type,
			headers:{ 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
			dataType:_dataType,
			success:function(res){
				// console.log(res);return false;
				window._success(res);
			},
			error:function(res){
				window._fail(res);
			}
		});
}


function _success(res){
	if (res.err_code === 0) {
			if(res.message == 1){  //到确认页面
				// console.log(res);return false;
				location.href = res.url;return false;
			}
			if(res.message == 2){  // 删除以后回到本页
				layer.msg(res.data,{icon:1});
				location.href = location.href;return false;
			}
			if(res.message == 3){  // 测试
				console.log(res);return false;
			}
            setTimeout(function () {
                location.href = res.url;
            }, 1000);
            if( isMobile() ){
            	notie.alert({ type: 3, text: res.message, time: 2.5 });return false;
            } else {
            	layer.msg(res.message,{icon:1});
            }
            
    }


    if(res.err_code === 1){
    	if( isMobile() ){
    		notie.alert({ type: 3, text: res.message, time: 2.5 });return false;
    	}
        layer.msg(res.message,{icon:3,anim:6});
    }
}


function _fail(res){
	console.log(res);
}

//判断必选项是否都填写
function checkNull() {
	$(".error-null").hide();
	var flag = true;
	
	$(".required-item").each(function() {
	 	if( $(this).val() == "" ) {
	 		$(this).parent("div").siblings("div").children(".error-null").show();
	 		flag = false;
	 	}
	});
	
	return flag;
}

function isMobile(){
	if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
    	return true;
	} 
	return false;
}


