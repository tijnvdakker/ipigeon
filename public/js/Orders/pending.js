var orders = document.getElementsByTagName("table");
console.log(orders);
for (var order of orders) {
	var sliders = order.querySelectorAll("input[type='checkbox']");
	console.log(sliders);
	for (var slider of sliders) {
		slider.setAttribute('data-order-id', order.id);
		slider.addEventListener('change', function(event) {
			if (this.checked) {
				this.checked = true;
				console.log(this.getAttribute('data-order-id'), this.getAttribute('data-id'));
				ajaxCall('edit_order_product_status', {order_id:this.getAttribute('data-order-id'), product_id:this.getAttribute('data-id'), prepared:1});
			} else {
				this.checked = false;
				console.log(this.getAttribute('data-order-id'), this.getAttribute('data-id'));
				ajaxCall('edit_order_product_status', {order_id:this.getAttribute('data-order-id'), product_id:this.getAttribute('data-id'), prepared:0});
			}
		})
	}
}