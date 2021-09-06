var orderTab = document.getElementById('order_tab');
var orderSubmenu = document.getElementById('order_submenu');
orderTab.addEventListener("click", function() {
	if (orderSubmenu.style.display == "none") {
		orderSubmenu.style.display = "block";
	} else {
		orderSubmenu.style.display = "none";
	}
});

