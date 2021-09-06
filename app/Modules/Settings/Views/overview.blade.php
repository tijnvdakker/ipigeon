@extends('layout.main')
@section('content')
<?php
$pageHeader = new pageHeader("<span class='las la-cog'></span> Settings");
$pageHeader->addSubTitle("Configure settings for application");
echo $pageHeader->render();
?>
<div class="details-card"> 
                <div class="card-title">
                    <h3>Change settings:</h3>
                </div>
                <div class="details-container">
                    <div class="details-div">
                      <b>First name:</b> 
                      <span> Goo </span>
                      <br>
                    </div>
                </div>
</div> 
        
@endsection
