$(document).ready(function () {
	$("#submit").click(function() {
		$.ajax({
			url: "checkAnswer.php",
			data: {answer: $("#answer").val()},
			success: function(data) {
				$("#response").html(data);
			}
		});
	});

});