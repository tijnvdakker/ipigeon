var selects = document.querySelectorAll("select");
console.log(selects);
for (var select of selects) {
    select.addEventListener('change', function(event) {
    	console.log(this.getAttribute('data-id'));
        ajaxCall('/timesheet/hour_status', {id:this.getAttribute('data-id'), value:this.value}, 'Updating...');
    });
};

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

$('input[type="checkbox"]').not('#sidebar-toggle').change(function() {
    if ($(this).is(":checked")) {
        ajaxCall('/timesheet/change_employee_hour_edit_right', {id:this.getAttribute('data-id'), value:1}, "Updating...");
    } else {
        ajaxCall('/timesheet/change_employee_hour_edit_right', {id:this.getAttribute('data-id'), value:0}, "Updating...");
    }
});

$(':button').click(function() {

    if ($(this).attr('data-type') == "disable") {
        ajaxCall('/timesheet/change_employee_month_edit_rights', {month:$(this).attr('data-month'),
                                                      user_id:$(this).attr('data-user-id'),
                                                      allow_edit:0}, "Disabling...");
        user_id = $(this).attr('data-user-id');
        $('#' + user_id + ' input[type="checkbox"]').prop('checked', false);
    } else if ($(this).attr('data-type') == "enable") {
        ajaxCall('/timesheet/change_employee_month_edit_rights', {month:$(this).attr('data-month'),
                                                      user_id:$(this).attr('data-user-id'),
                                                      allow_edit:1}, "Enabling...");
        user_id = $(this).attr('data-user-id');
        $('#' + user_id + ' input[type="checkbox"]').prop('checked', true);
    }
    
});
