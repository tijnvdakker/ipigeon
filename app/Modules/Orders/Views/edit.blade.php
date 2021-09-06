@extends('layout.main')
@section('content')
<?php
$pageHeader = new pageHeader("Edit");
$pageHeader->addSubTitle("Edit orders");
echo $pageHeader->render();
?>
<div class="form-card"> 
                <div class="card-title">
                    <h3>Edit order:</h3>
                </div>
                    {{ Form::model($order, ['url'=>['/orders/edit', $order->id]]) }}
					{{ Form::label('name', "Name") }}
					{{ Form::text('name') }}

					{{ Form::label('table_number', "Table number") }}
					{{ Form::text('table_number') }}

					{{ Form::submit('Save') }}
            </div> 
@endsection