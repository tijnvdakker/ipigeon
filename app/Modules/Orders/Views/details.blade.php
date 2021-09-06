@extends('layout.main')
@section('content')
<?php
$pageHeader = new pageHeader("Details");
$pageHeader->addSubTitle("Order details");
echo $pageHeader->render();
?>
<div class="details-card"> 
                <div class="card-title">
                    <h3>Order details:</h3>
                </div>
                <div class="details-container">
                    <div class="details-div">
                    	<b>Name:</b> 
                    	<span> {{ $order->name }} </span>
                    	<br>
                    </div>
                    <div class="details-div">
                    	<b>Table:</b> 
                    	<span> {{ $order->table_number }} </span>
                    	<br>
                    </div>
                    <div style="display: flex; justify-content: center; margin-top: 2rem;">
                        <a href="/orders/delete/{{$order->id}}" class="primary-button"
                            onclick="return confirm('Are you sure you want to delete this order?')">Delete</a>
                    </div>
                </div>
</div> 
@endsection