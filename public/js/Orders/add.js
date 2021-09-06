$(document).ready(function () {
	setMessage("Retrieving...");
	$('.product-select').select2({
  	ajax: {
    	url: '/products/jq_get_products',
    	type: "get",
    	processResults: function (data) {
      	// Transforms the top-level key of the response object from 'items' to 'results'
      	console.log(data.items);
      	console.log(data.term);
      	return {
        	results: $.map(data.items, function (item) {
                return {
                    text: item.name,
                    id: item.id,
                    value: item.id
                }
            })
      	};
    	}
  	}
	});
})

$('#product_select').change(function () {
	console.log("Hello!");
	var text = $('#product_select option:selected').toArray().map(item => item.text);
	console.log(text)
	$('#product_results tbody').append("<tr><td>" + text.pop() + "</td></tr>")
});

