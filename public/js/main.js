function ajaxCall(url, data, message) {
	setMessage(message);
    $.ajax({url: url,
        type: "POST",
        data:data,
        success: function(response){
        	console.log("Done");
        }
    });
}

function setMessage(message) {
    ajax_message = message;
}

$(document).ajaxSend(function(event, request, settings) {
	$('#box b').html(ajax_message);
    $('#box').show();
});

$(document).ajaxComplete(function(event, request, settings) {
    $('#box').hide();
});