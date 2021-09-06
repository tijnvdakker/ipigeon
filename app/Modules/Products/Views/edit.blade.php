@extends('layout.main')
@section('content')
<?php
$pageHeader = new pageHeader("Edit");
$pageHeader->addSubTitle("Edit reservations");
echo $pageHeader->render();
?>
<div class="form-card"> 
                <div class="card-title">
                    <h3>Edit reservation:</h3>
                </div>
                    {{ Form::model($reservation, ['url'=>['/reservations/edit', $reservation->id]]) }}
					{{ Form::label('name', "Name") }}
					{{ Form::text('name') }}

					{{ Form::label('date', "Date") }}
					{{ Form::date('date') }}

					{{ Form::label('table_number', "Table number") }}
					{{ Form::text('table_number') }}

					{{ Form::submit('Save') }}
            </div> 
@endsection