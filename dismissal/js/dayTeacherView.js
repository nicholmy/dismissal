$(document).ready(function(){
	currentTeacher = $("#teacherID").val()
	currentDay = $("#dayID").val()
	
	$("#teacherID").change(function() {
		updateVals();
		grabTable();
		//grabOverride();
	});	
	
	/*$("#dayID").change(function() {
		updateVals();
		grabTable();
	});*/
});

function updateVals() {
	currentTeacher = $("#teacherID").val()
	currentDay = $("#dayID").val()
}

function grabTable() {
	$.ajax({
		url : "../controllers/Assignment/withOverrides.php",
		data : {
			teacherID : currentTeacher
		},
		success : function(response) {
			$("#table").html(response)
		}
	});
}

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
}