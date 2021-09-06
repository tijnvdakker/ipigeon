@extends('layout.main')
@section('content')
<?php
$pageHeader = new pageHeader("Details");
$pageHeader->addSubTitle("Reservation details");
echo $pageHeader->render();
?>
<div class="details-card"> 
                <div class="card-title">
                    <h3>Reservation details:</h3>
                </div>
                <div class="details-container">
                    <div class="details-div">
                    	<b>Name:</b> 
                    	<span> {{ $reservation->name }} </span>
                    	<br>
                    </div>
                    <div class="details-div">
                    	<b>Date:</b> 
                    	<span> {{ $reservation->date }} </span>
                    	<br>
                    </div>
                    <div class="details-div">
                    	<b>Table:</b> 
                    	<span> {{ $reservation->table_number }} </span>
                    	<br>
                    </div>
                </div>
                <div style="display: flex; justify-content: center; margin-top: 2rem;">
                        <a href="/reservations/delete/{{$reservation->id}}" class="primary-button"
                            onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</a>
                    </div>
</div> 
@endsection