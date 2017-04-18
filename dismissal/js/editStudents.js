$(document).ready(function(){
	//grabTable();
	$("#studentID").change(function() {
		updateDropDowns($(this).val());
		grabTable();
	});	
});

function updateDropDowns(studID) {
	newLast = "";
	newFirst = "";
	newTeach = 0;
	
	$.ajax({
		url : "../controllers/Student/getStudent.php",
		dataType : "json",
		data : {
			studentID : studID
		},
		success : function(response) {
			newLast = response["lastName"];
			newFirst = response["firstName"];
			newTeach = response["homeTeacherID"];
			
			$("#lastName").val(newLast);
			$("#firstName").val(newFirst);
			$("#homeTeacherID").val(newTeach);
		}
	});
}

function grabTable() {
	$.ajax({
		url : "../controllers/Student/list.php",
		success : function(response) {
			$("#table").html(response);
			$("#studentTable").dataTable();
		}
	});
}