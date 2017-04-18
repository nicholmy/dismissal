$(document).ready(function(){
	$("#lineName").change(function() {
		$.ajax({
			url : "../controllers/Student/lineView.php",
			data : {
				lineName : $(this).val()
			},
			success : function(response) {
				$("#table").html(response)
			}
		});
	});	
});