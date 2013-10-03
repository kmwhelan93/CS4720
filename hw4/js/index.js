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


	var create_reminder = function() {
    	$.ajax({
    		url: "reminders/insert",
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
					window.location = "login";
					return false;
				}
				$("#create-reminder").modal('hide');
				$("ul.list-group").append('<li class="list-group-item">' + data['title'] +  '</li>'); // todo add id for deleting
				window.location = "reminders"; // todo remove this and use actual id of item
    		}
    	});
    };


        var registerRemove = function () {
    	$(".minus-sign").on("click", function () {
    	$.ajax({
    		url: "reminders/delete",
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

	// make the modal have defaults for creating a reminder
	var make_create_modal = function () {
		$("#create-reminder .modal-header .modal-title").html('Create Reminder');
		$("#input-title").val('');
		$("#create-button").html("Create");
		$("#priority-value").html(2)
		$("#input-priority").slider('value', 2);
		$("#input-notes").val('');

		 $("#create-button").on('click', create_reminder);

		$("#create-reminder").modal('show');
	};

	var render_reminders = function () {
		// TODO fix title if no reminders
		var result = '<li class="list-group-item active">Your Reminders<span id="plus-sign" type="button" style="float:right;" class="btn btn-default">+</span></li>';
		for (id in reminders) {
			var reminder = reminders[id];
			var notes = reminder['notes'];
			if (notes.length > 40) {
				notes = notes.substring(0, 40) + "...";
			}
			result += '<li class="list-group-item"><button type="button" class="btn btn-link title">' + reminder['title'] + '</button>&nbsp;&nbsp;<a href="reminders/view/' + id + '">view</a>&nbsp;&nbsp;<span class="notes">' + notes + '</span><span class="minus-sign"><img src="img/minus-sign.gif"><span class="reminder_id" style="display:none">' + id + '</span></img></span></li>';
		}
		$("ul.list-group").html(result);
		registerRemove();
		registerUpdate();
		$("#plus-sign").on('click', make_create_modal);
	};

	


	

	// make the modal have defaults for updating a reminder
	var make_update_modal = function (reminder_id) {
		$("#create-reminder .modal-header .modal-title").html('Update Reminder');
		$("#input-title").val(reminders[reminder_id]['title']);
		$("#create-button").html("Update");
		$("#priority-value").html(reminders[reminder_id]['priority'])
		$("#input-priority").slider('value', reminders[reminder_id]['priority']);
		$("#input-notes").val(reminders[reminder_id]['notes']);

		 $("#create-button").click({reminder_id: reminder_id}, update_reminder);

		$("#create-reminder").modal('show');
	};

	var update_reminder = function(event) {
		$.ajax({
			url: 'update_reminder.php',
			data: { id: event.data.reminder_id,
					title: $("#input-title").val(),
					priority: $("#priority-value").html(),
					notes: $("#input-notes").val()
					},
			success: function (data) {
				$("#create-reminder").modal('hide');
				reminders[event.data.reminder_id] = {notes: $("#input-notes").val(), priority: $("#priority-value").html(), title: $("#input-title").val()};
				console.log(reminders);
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

	




    var registerUpdate = function () {
    	$(".list-group-item button").on("click", function () {
    		make_update_modal($(this).parent().find(".reminder_id").html());
    	});
    };
	
});