$(document).ready(function(){
	$("#assignmentID").change(function() {
		updateDropDowns($(this).val());
	});	
});

function updateDropDowns(assignID) {
	newStudent = 0;
	newDay = 0;
	newBus = 0;
	$("#table").html("Loading...")
	$.ajax({
		url : "../controllers/Assignment/getAssignment.php",
		dataType : "json",
		data : {
			assignmentID : assignID
		},
		success : function(response) {
			newStudent = response["studentID"];
			newDay = response["dayID"];
			newBus = response["busID"];
			
			$("#studentID").val(newStudent);
			$("#dayID").val(newDay);
			$("#busID").val(newBus);
			$("#table").html("");
		}
	});
}

function grabTable() {
	$.ajax({
		url : "../controllers/Assignment/byDayTeacher.php",
		data : {
			teacherID : currentTeacher,
			dayID : currentDay
		},
		success : function(response) {
			$("#table").html(response)
		}
	});
}