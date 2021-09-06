$('#month-input').change(function() {
	ajax_message = "Retrieving...";
	$.ajax({url: '/timesheet/month_select',
        type: "POST",
        data: {month: $(this).val()},
        success: function(response) {
            window.location = response.url;
        }
    });
});