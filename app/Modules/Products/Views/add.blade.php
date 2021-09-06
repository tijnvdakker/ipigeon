@extends('layout.main')
@section('content')
<?php
$pageHeader = new pageHeader("Add");
$pageHeader->addSubTitle("Add product");
echo $pageHeader->render();
?>
<div class="form-card"> 
                <div class="card-title">
                    <span class="las la-cubes"></span>
                    <h3>Product:</h3>
                </div>
                <form method="post" action="/products/add">
                  @csrf
                	<label for="name">Name</label>
              		<input type="text" class="form-control" name="name"/>

              		<label for="name">Category</label>
              		<input type="text" class="form-control" name="category"/>

              		<label for="name">Price</label>
              		<input type="text" class="form-control" name="price"/>

              		<input type="submit" value="Save">
                </form>
</div> 
@endsection