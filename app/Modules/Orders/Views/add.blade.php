@extends('layout.main')
@section('content')
<?php
$pageHeader = new pageHeader("Add");
$pageHeader->addSubTitle("Add orders");
echo $pageHeader->render();
?>
<div class="form-card"> 
                <div class="card-title">
                    <span class="las la-utensils"></span>
                    <h3>Order:</h3>
                </div>
                <form method="post" action="/orders/add">
                  @csrf
                	<label for="name">Name</label>
              		<input type="text" class="form-control" name="name"/>

              		<label for="name">Table number</label>
              		<input type="text" class="form-control" name="table_number"/>

                  <label for="products">Products</label>

                  <select name="products[]" class="product-select" id="product_select" style="height:80px;" multiple="multiple">
                  </select>

                  <table id="product_results">
                    <tbody>
                    </tbody>
                  </table>

              		<input type="submit" value="Save">
                </form>
                    @push('scripts')
                    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                    <script 
                    src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js">
                    </script>
                    @endpush
</div> 
@endsection