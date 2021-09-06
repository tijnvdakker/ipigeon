@extends('layout.main')
@section('content')
<?php
$pageHeader = new pageHeader("Add");
$pageHeader->addSubTitle("Add reservations");
echo $pageHeader->render();
?>
<div class="form-card"> 
                <div class="card-title">
                    <span class="las la-utensils"></span>
                    <h3>Reservations:</h3>
                </div>
                <form method="post" action="/reservations/add">
                  @csrf
                	<label for="name">Name</label>
              		<input type="text" class="form-control" name="name"/>

              		<label for="name">Date</label>
              		<input type="date" class="form-control" name="date"/>

              		<label for="name">Table number</label>
              		<input type="text" class="form-control" name="table_number"/>

              		<input type="submit" value="Save">
                </form>
              @if ($errors->any())
              <div>Hello!</div>
                <div class="alert alert-danger">
                   <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
</div> 
@endsection