$(document).ready(function () {
	$("#submit").click(function() {
		$.ajax({
			url: "checkAnswer.php",
			data: {answer: $("#answer").val()},
			success: function(data) {
				$("#response").html(data);
			}
		});
		$.ajax({
			url: "checkAnswer2.php",
			data: {answer: $("#answer").val()},
			success: function(data) {
				
			}
		});
	});

});