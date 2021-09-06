@extends('layout.main')
@section('content')
<?php
$pageHeader = new pageHeader("Details");
$pageHeader->addSubTitle("Employee details");
echo $pageHeader->render();
?>
<div class="details-card"> 
                <div class="card-title">
                    <h3>Employee details</h3>
                </div>
                <div class="details-container">
                    <div class="details-div">
                    	<b>First name:</b> 
                    	<span> {{ $employee->first_name }} </span>
                    	<br>
                    </div>
                    <div class="details-div">
                    	<b>Last name:</b> 
                    	<span> {{ $employee->last_name }} </span>
                    	<br>
                    </div>
                    <div class="details-div">
                    	<b>Email</b> 
                    	<span> {{ $employee->email }} </span>
                    	<br>
                    </div>
                    <div class="details-div">
                        <b>Gender</b> 
                        <span> {{ $employee->gender }} </span>
                        <br>
                    </div>
                    <div class="details-div">
                        <b>Birthdate</b> 
                        <span> {{ $employee->birth_date }} </span>
                        <br>
                    </div>
                    <div class="details-div">
                        <b>Address</b> 
                        <span> {{ $employee->address }} </span>
                        <br>
                    </div>
                </div>
</div> 
@endsection