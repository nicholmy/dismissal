$(document).ready(function(){
	currentLine = $("#lineID").val()
	currentDay = $("#dayID").val()
	
	$("#lineID").change(function() {
		updateVals();
		grabTable();
	});	
	
	$("#dayID").change(function() {
		updateVals();
		grabTable();
	});
});

function updateVals() {
	currentLine = $("#lineID").val()
	currentDay = $("#dayID").val()
}

function grabTable() {
	$.ajax({
		url : "../controllers/Assignment/byDayLine.php",
		data : {
			lineID : currentLine,
			dayID : currentDay
		},
		success : function(response) {
			$("#table").html(response)
		}
	});
}