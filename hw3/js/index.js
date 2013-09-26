$(document).ready(function() {
	var reminders = new Array();

	$.ajax({
		url: 'getListItems.php',
		success: function(data) {
			data = $.parseJSON(data);
			reminders = data['list_items'];
			render_reminders();
		}
	});

	var render_reminders = function () {
		// TODO fix title if no reminders
		var result = '<li class="list-group-item active">Your Reminders<a data-toggle="modal" href="#create-reminder" type="button" style="float:right;" class="btn btn-default">+</a></li>';
		for (id in reminders) {
			var reminder = reminders[id];
			result += '<li class="list-group-item"><button type="button" class="btn btn-link">' + reminder['title'] + '</button><span class="minus-sign"><img src="img/minus-sign.gif"><span class="reminder_id" style="display:none">' + id + '</span></img></span></li>';
		}
		$("ul.list-group").html(result);
		registerRemove();
		registerUpdate();
	};


	// make the modal have defaults for creating a reminder
	var make_create_modal = function () {

	};

	// make the modal have defaults for updating a reminder
	var make_update_modal = function (reminder_id) {
		$("#create-reminder .modal-header .modal-title").html('Update Reminder');
		$("#input-title").val(reminders[reminder_id]['title']);
		$("#create-button").html("Update");
		$("#input-priority").val(reminders[reminder_id]['priority']);
		$("#input-notes").val(reminders[reminder_id]['notes']);

		 $("#create-button").click({reminder_id: reminder_id});

		$("#create-reminder").modal('show');
	};

	var update_reminder = function(reminder_id) {
		$.ajax({
			url: 'update_reminder.php',
			data: { id: reminder_id,
					title: $("#input-title").val(),
					priority: $("#input-priority").val(),
					notes: $("#input-notes").val()
					},
			success: function (data) {
				console.log(data);
				$("#create-reminder").modal('hide');
				reminders[reminder_id] = {notes: notes, priority: priority, title: title};
				render_reminders();
			}
		})
	};

	$( "#input-priority" ).slider({
      value:2,
      min: 1,
      max: 5,
      step: 1,
      slide: function( event, ui ) {
        $( "#priority-value" ).html(ui.value );
      }
    });

    $("#create-button").on("click", function() {
    	$.ajax({
    		url: "create_reminder.php",
    		data: { title: $("#input-title").val(),
    				priority: $("#priority-value").html(),
    				notes: $("#input-notes").val()},
    		success: function(data) {
				data = $.parseJSON(data);
				if (!data['success']) {
					alert("reminder creation failed!");
					return false;
				}
				if (!data['loggedin']) {
					alert("you are not logged in. Click ok to continue to login page.");
					window.location = "login.php";
					return false;
				}
				$("#create-reminder").modal('hide');
				$("ul.list-group").append('<li class="list-group-item">' + data['title'] +  '</li>'); // todo add id for deleting
    		}
    	})
    });


    var registerRemove = function () {
    	$(".minus-sign").on("click", function () {
    	$.ajax({
    		url: "delete_reminder.php",
    		data: {id: $(this).children('span').html() },
    		context: this,
    		success: function (data) {
    			console.log(data);
    			data = $.parseJSON(data);
				if (!data['success']) {
					alert("reminder creation failed!");
					return false;
				}
				if (!data['loggedin']) {
					alert("you are not logged in. Click ok to continue to login page.");
					window.location = "login.php";
					return false;
				}
				delete reminders[$(this).children('span').html()];
				render_reminders();

    		}
    	})
    });
    };


    var registerUpdate = function () {
    	$(".list-group-item button").on("click", function () {
    		make_update_modal($(this).parent().find(".reminder_id").html());
    	});
    };
	
});