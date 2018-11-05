$(function() {
	
	if( $.cookie('client_message_cnt') == undefined || $.cookie('client_message_cnt') == "" ) {
		$.cookie('client_message_cnt', 0, { expires: 365,  path: '/' });
	}
	
	if(server_message_cnt != $.cookie('client_message_cnt')) {
		$(".message").append("<p class='dot'></p>");
	}
	
});
