$(document).ready(function() {
	var reminder = new Array();

	$.ajax({
		url: '../../getReminder.php',
		data: {id: $("#reminder_id").html()},
		success: function(data) {
			data = $.parseJSON(data);
			if (data['success']) {
				reminder = data['reminder'];
				render_reminder()
			} else {
				$("#not_found").show();
			}
			
		}
	});



	var render_reminder = function () {
		$("#input-title").val(reminder['title']);
		$("#priority-value").html(reminder['priority'])
		$("#input-priority").slider('value', reminder['priority']);
		$("#input-notes").val(reminder['notes']);
	};

	


	var update_reminder = function(id) {
		$.ajax({
			url: '../../update_reminder.php',
			data: { id: id,
					title: $("#input-title").val(),
					priority: $("#priority-value").html(),
					notes: $("#input-notes").val()
					},
			success: function (data) {
				reminder = {notes: $("#input-notes").val(), priority: $("#priority-value").html(), title: $("#input-title").val()};
				render_reminder();
				alert("successful update");
				window.location = "../../reminders";
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

	
    	$("#update-button").on("click", function () {
    		update_reminder($("#reminder_id").html());
    	});
  
	
});