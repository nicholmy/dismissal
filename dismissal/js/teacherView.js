$(document).ready(function(){
	$("#teacherID").change(function() {
		$.ajax({
			url : "../controllers/Student/teacherView.php",
			data : {
				teacherID : $(this).val()
			},
			success : function(response) {
				$("#table").html(response)
			}
		});
	});	
});