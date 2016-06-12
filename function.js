$(function() {
$(".like").click(function() {
var item_id = $(this).attr("id");
var dataString = 'item_id='+item_id;  
	$.ajax({
		type: "POST",
		url: "func.php",
		data: dataString,
		cache: false,
		success: function(data){
		$('a#'+item_id).html(data);	
		}  
	});
});
});

