$(document).ready(function(){
	currentBus = $("#busID").val()
	currentDay = $("#dayID").val()
	
	$("#busID").change(function() {
		updateVals();
		grabTable();
		grabOverride();
	});	
	
	$("#dayID").change(function() {
		updateVals();
		grabTable();
	});
});

function updateVals() {
	currentBus = $("#busID").val()
	currentDay = $("#dayID").val()
}

function grabTable() {
	$.ajax({
		url : "../controllers/Assignment/byDayBus.php",
		data : {
			busID : currentBus,
			dayID : currentDay
		},
		success : function(response) {
			$("#table").html(response)
		}
	});
}

function grabOverride() {
	$.ajax({
		url : "../controllers/Override/byBus.php",
		data : {
			busID : currentBus,
		},
		success : function(response) {
			$("#overrideTable").html(response)
		}
	});
}