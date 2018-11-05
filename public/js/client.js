;var message_1 = {
	recipients 		: "请填写收件人",
	contact    		: "请填写联系方式",
	address    		: "请填写详细地址",

	order_type 		: "请选择支付方式",
	invoices_type   : "请选择是否开票"
}, message_2 = {
	company_name    : "请填写开票公司名称",
	tax_number      : "请填写开票税号"
};


$(document).ready(function(){
	$(document).on('click', '.buy-goods-btn', function(){
		$(this).parent().parent().parent().next().toggle();
	});



	$('.buy-goods-btn-confirm, .buy-goods-btn-reconfirm, .balance-btn').on('click', function(e){
		var flag = false;
		var image_src = '', goods_name = '', 
		price='', size= '', number = '', ids = '', buy_comment = '';


		$('.size-number').each(function(){
		 	if ($(this).css('display') == 'block'){
				flag = true;
				image_src 	+= $(this).prev().find('img').attr('src') + '|';
				goods_name  += $(this).prev().find('.goods-name').text() + '|';

				price       += $(this).prev().find('.goods-price').text().replace(/￥/, '') + '|';
				if( e.target.getAttribute('data-tag') && e.target.getAttribute('data-tag') == 'balance' ){
					size        += $(this).find('.goods-size').text() + '|';
				} else {
					size        += $(this).find('.goods-size').val() + '|';
				}
				
				number      += $(this).find('.goods-number').val() + '|';
				ids         += $(this).attr('data-id') + '|';
		 	}
		});
		

		
		if(!flag){
			notie.alert({ type: 3, text: '请选择购买的商品', time: 2.5 });return false;
			
		}

		if(image_src != "")image_src 	= image_src.substr(0, image_src.length - 1);
		if(goods_name != "")goods_name 	= goods_name.substr(0, goods_name.length - 1);
		if(price != "")price 			= price.substr(0, price.length - 1);
		if(size != "")size	 			= size.substr(0, size.length - 1);
		if(number != "")number 			= number.substr(0, number.length - 1);
		if(ids != "")ids 				= ids.substr(0, ids.length - 1);


		if( e.target.getAttribute('data-tag') && e.target.getAttribute('data-tag') == 'second' || e.target.getAttribute('data-tag') == 'balance' ){
			$('#buy-comment').val($('#buy-comment-src').val());
		}

		$('#image_src').val(image_src);
		$('#goods_name').val(goods_name);
		$('#price').val(price);
		$('#size').val(size);
		$('#number').val(number);
		$('#ids').val(ids);
		
		//提交
		var _url = $('#form').attr('action');
		var _data = $('#form').serialize();
		_ajax(_url, _data);
		return false;
	});
	
	$(document).on('click', '.clear-goods-btn', function(){
		var _this = $(this);
		 notie.confirm({
          text: '确定移除吗？',
          cancelCallback: function () {
            
          },
          submitCallback: function () {
          	_this.parent().parent().parent().parent().remove();
          }
        });
	});


	$(document).on('change', '.chg-buy-number-byclick', function(){
		var number = $(this).val();
		var price = $(this).parent().parent().prev().find('.goods-price').text().replace(/￥/, '');
		var smallTotal = number + ' × ' + '￥' + price + '=' + '￥' + (price * number);
		
		$(this).parent().next().find('.small-total').text(smallTotal);

		var sumTotal = 0;
		$('.size-number').each(function(){
			var _price     	= $(this).prev().find('.goods-price').text().replace(/￥/, '');
			var _number     = $(this).find('.goods-number').val();
			sumTotal 	   += _price * _number;
		});

		$('.sum-total').text('合计￥'+sumTotal);
	});

	//最终提交
	$('#order-last-btn').on('click', function(){
		$('#recipients').val($('.recipients').val());
		$('#contact').val($('.contact').val());
		$('#address').val($('.address').val());

		$("#order_type").val( $("input[name=order_t]:checked").val() );
		$("#invoices_type").val( $("input[name=invoices_t]:checked").val() );


		$('#company_name').val($('.company_name').val());
		$('#tax_number').val($('.tax_number').val());
		
		var seriArr = $('#form').serializeArray();

		var obj = {};
		for(var arg in seriArr)
		{
			obj[seriArr[arg]['name']] = seriArr[arg]['value'];
		}

		for(var arg in message_1)
		{
			if(obj[arg] == "" || obj[arg] == undefined)
			{
				notie.alert({ type: 3, text: message_1[arg], time: 2.5 });return false;
			}
		}

		//开票
		if(obj.invoices_type == 1)
		{
			for(var arg in message_2)
			{
				if(obj[arg] == "" || obj[arg] == undefined)
				{
					notie.alert({ type: 3, text: message_2[arg], time: 2.5 });return false;	
				}
			}
		}

		var _url = $('#form').attr('action');
		var _data = $('#form').serialize();
		_ajax(_url, _data);
		return false;
	});


	// $('.order_type').on('click', function(){
	// 	$("#order_type").val( $(this).val() );
	// });

	// $('.invoices_type').on('click', function(){
	// 	$("#invoices_type").val( $(this).val() );
	// });
	
});






/**
 // if($(this).find('select').val() == ""){
		 		// 	if( isMobile() ){
		 		// 		notie.alert({ type: 3, text:'您购买的 【'+$(this).prev().find('.goods-name').text()+'】 没有选择尺寸', time:2.5 });return false;
		 		// 	}
		 		// }

*/