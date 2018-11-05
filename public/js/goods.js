;$(document).ready(function(){


	$(".submit-goods").on('click', function(){
		//获得投放的校区
		setSchoolString();

		//获得尺寸
		getSizeString();

		//判断选项是否都选择了
		if(!checkNull()) return false;

		//此时 可以提交了
		var _url = $('#form').attr('action');
		var _data = $('#form').serialize();
		_ajax(_url, _data);
	});



	//---------------------- 投放校区
	$('.school-in').on('click', function(){
		var _waiting = $(".waiting").val();
		if(_waiting == "" || _waiting == null || _waiting == undefined)return false;
		//遍历选中的学校
		for(var i=0; i<_waiting.length; i++)
		{
			var _option = $(".waiting option[value=" + _waiting[i] + "]");
			$(".choosed").append(_option);
		}
	});


	$('.school-out').on('click', function(){
		var _choosed = $(".choosed").val();
		if(_choosed == "" || _choosed == null || _choosed == undefined)return false;
		//遍历
		for(var i=0; i<_choosed.length; i++)
		{
			var _option = $(".choosed option[value=" + _choosed[i] + "]");
			$(".waiting").append(_option);
		}
	});

	//---------------------- 尺寸
	$('.add-size').on('click', function(){
		var _value = $("#size").val();
		if(_value == "" || _value == null || _value == undefined)return false;
        var _tr = '<tr>' +
        		  '<td class="tb-text"><span>' + _value + '</span></td>' + 
        		  '<td><div class="btn btn-danger btn-xs del-size">删除</div></td>' +
        		  '</tr>';
		$('table.tb > tbody').append(_tr);
	});

	$(document).on("click", ".del-size", function(){
		$(this).parent().parent().remove();
	});

});


function setSchoolString()
{
	var str = "";
	$(".choosed option").each(function(){
		str += $(this).val() + ',';
	});

	if(str != '')str = str.substr(0, str.length - 1);

	$("#choosed-school").val(str);
}


function getSizeString()
{
	var _str = "";
	$("table.tb > tbody > tr >td.tb-text").each(function(){
		_str += $(this).text() + '|';
	});

	if(_str != "")_str = _str.substr(0, _str.length - 1);

	$("#size_str").val(_str);
}