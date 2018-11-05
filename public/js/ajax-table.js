
$(document).ready(function() {
	$(".ajax-table .edit").on("click", function() {
		$(this).parent("td").siblings("td").children(".table-span").hide();
		$(this).parent("td").siblings("td").children(".table-input").show();
				
		if($(".table-select").length > 0)
			$(this).parent("td").siblings("td").children(".table-select").removeAttr("disabled");
		
		$(this).hide();
		$(this).siblings(".confirm, .cancel").css("display", "inline-block");
	});
		
	$(".ajax-table .cancel").on("click", function() {
		$(this).parent("td").siblings("td").children(".table-span").show();
		$(this).parent("td").siblings("td").children(".table-input").hide();
		
		if($(".table-select").length > 0)
			$(this).parent("td").siblings("td").children(".table-select").attr("disabled", "disabled");
		
		$(this).hide();
		$(this).siblings(".confirm").hide();
		$(this).siblings(".edit").css("display", "inline-block");
	});	
});