$(document).ready(function(){
	$.ajax({
		url : "../controllers/Override/list.php",
		success : function(response) {
			$("#table").html(response);
			$("#overrideTableList").dataTable();
		}
	});
	
});