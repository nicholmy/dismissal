$(document).ready(function(){
	currentStudent = $("#studentID").val()
	
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
	$.ajax({
		url : "../controllers/Assignment/byStudent.php",
		data : {
			studentID : currentStudent
		},
		success : function(response) {
			$("#table").html(response)
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