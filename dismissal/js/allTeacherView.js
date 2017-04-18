$(document).ready(function(){
	//currentTeacher = $("#teacherID").val()
	//currentDay = $("#dayID").val()
	
	//updateVals();
	grabTable();
	//grabOverride();
	
	/*$("#dayID").change(function() {
		updateVals();
		grabTable();
	});*/
});

$( document ).ajaxStart(function() {
  $("#table").html("Loading...")
});

/*function updateVals() {
	//currentTeacher = $("#teacherID").val()
	currentDay = $("#dayID").val()
}*/

function grabTable() {
	$.ajax({
		url : "../controllers/Assignment/withOverridesAllTeachers.php",
		data : {
			teacherID : 0
		},
		success : function(response) {
			$("#table").html(response)
		}
	});
}

/*
function grabOverride() {
	$.ajax({
		url : "../controllers/Override/byTeacher.php",
		data : {
			teacherID : currentTeacher
		},
		success : function(response) {
			$("#overrideTable").html(response)
		}
	});
}*/