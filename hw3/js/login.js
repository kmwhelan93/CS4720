$(document).ready(function() {
	var isLogin = true;
	// when user clicks sign in button
	var login = function() {
		$.ajax({
			url: "try-login.php",
			data: {username: $("#username").val(),
					password: $("#password").val() },
			success: function (data) {
				data = $.parseJSON(data);
				if (data['success']) {
					window.location.href = "index.php";
				} else {
					alert("incorrect login");
				}
			}
		});
		return false;
	};

	var register = function() {
		$.ajax({
			url: "register.php",
			data: {username: $("#username").val(),
					password: $("#password").val() },
			success: function (data) {
				console.log(data);
				data = $.parseJSON(data);
				if (data['success']) {
					alert("user created! Click Ok to continue logging in."); // TODO make modal instead of alert
					window.location.href = "index.php";
				}
			}
		});
		return false;
	};

	var makeLogin = function() {
		$(".form-signin").on("submit", login);
		$("#switch-type").html("New User?");
		$("#submit-button").html("Sign in");
		$(".form-signin-heading").html("Please sign in");
		isLogin = true;
	}

	var makeRegister = function() {
		$(".form-signin").on("submit", register);
		$("#switch-type").html("Switch to login");
		$("#submit-button").html("Register");
		$(".form-signin-heading").html("Please register");
		isLogin = false;
	}

	$(".form-signin").on("submit", login);

	$("#switch-type").on("click", function () {
		if (isLogin) {
			makeRegister();
		} else {
			makeLogin();
		}

	});
});