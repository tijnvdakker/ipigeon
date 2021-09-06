@extends('layout.main')
@section('content')
<?php
$pageHeader = new pageHeader("Edit");
$pageHeader->addSubTitle("Edit hour");
echo $pageHeader->render();
?>
<div class="form-card"> 
                <div class="card-title">
                    <h3>Edit hour:</h3>
                </div>
                    {{ Form::model($hour, ['url'=>['/timesheet/edit', $hour->id]]) }}
					{{ Form::label('date', "Date") }}
					{{ Form::date('date') }}

					{{ Form::label('time_from', "From") }}
					{{ Form::time('time_from') }}

					{{ Form::label('time_to', "To") }}
					{{ Form::time('time_to') }}

					{{ Form::label('task', "Task") }}
					{{ Form::text('task') }}

					{{ Form::submit('Save') }}
            </div> 
@endsection