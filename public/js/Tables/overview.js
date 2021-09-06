var tables = document.getElementsByClassName('table-single');
for (var table of tables) {
	table.addEventListener('click', function(event) {
		setMessage("Retrieving...");
		$.ajax({url: 'retrieve_orders',
        	type: "POST",
        	data:{table_number:this.id},
        	success: function(response){
        		updateOrderBox(response.orders);
        	}
    	});
	})
}

function updateOrderBox(orders) {
	var result = "";
	for (var order of orders) {
		result += order;
	}
	if (result == "") {
		result = "No orders found!";
	}
	$("#order-box").html(result);
}