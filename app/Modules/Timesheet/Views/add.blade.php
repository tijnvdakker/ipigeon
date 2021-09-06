@extends('layout.main')
@section('content')
<?php
$pageHeader = new pageHeader("Add");
$pageHeader->addSubTitle("Add hours");
echo $pageHeader->render();
?>
<div class="form-card"> 
                <div class="card-title">
                    <span class="las la-utensils"></span>
                    <h3>Hours:</h3>
                </div>
                <form method="post" action="/timesheet/add">
                  @csrf
                	<label for="name">Date</label>
              		<input type="date" class="form-control" name="date"/>

              		<label for="name">From</label>
              		<input type="time" class="form-control" name="time_from"/>

                  <label for="name">To</label>
                  <input type="time" class="form-control" name="time_to"/>

                  <label for="task">Task</label>
                  <input type="text" class="form-control" name="task">

              		<input type="submit" value="Save">
                </form>
</div> 
@endsection