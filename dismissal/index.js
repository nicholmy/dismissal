$(document).ready(function(){
	$.ajax({
		url : "controllers/Teacher/list.php",
		success : function(response) {
			$("#test").html(response)
		}
	});
});