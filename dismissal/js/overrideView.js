$(document).ready(function(){
	$("#date").datepicker({ dateFormat: "yy-mm-dd" });
	
	currentStudent = $("#studentID").val();
	
	$("#studentID").change(function() {
		updateVals();
		grabTable();
		grabOverride();
	});
});

function updateVals() {
	currentStudent = $("#studentID").val()
}

function grabTable() {
	$("#status").html("Loading Assignments...")
	$.ajax({
		url : "../controllers/Assignment/byStudent.php",
		data : {
			studentID : currentStudent
		},
		success : function(response) {
			$("#status").html("")
			$("#studentTable").html(response)
		}
	});
}

function grabOverride() {
	$.ajax({
		url : "../controllers/Override/byStudent.php",
		data : {
			studentID : currentStudent
		},
		success : function(response) {
			$("#overrideTable").html(response)
		}
	});
}
