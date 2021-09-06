@extends('layout.main') 
@section('content')
<?php
$pageHeader = new pageHeader("<span class='las la-clipboard-list'></span> Overview", ['Add'=>'/orders/add']);
$pageHeader->addSubTitle("View current orders per table");
echo $pageHeader->render();
?>

    <div class="tables-container">

    	<?php if (count($tables) > 0) {
    	foreach ($tables as $table) { ?>
    		<div class="table-single" id="{{$table->table_number}}">
                <div class="tables-container-div">
                    <b><?= $table->table_number ?></b>
                    <span class="las la-clipboard-check"></span>
                </div>
                <div class="tables-container-div">
                    <span>Empty</span>
                </div>
            </div>
   		<?php } 
   		} else {
   			echo "No tables!";
   		}?>             
    </div> 
<div class="card-large"> 
    <div class="card-title">
        <h3>Orders</h3>
    </div>
    <div class="table-container" id="order-box"> 
    	<span>No orders found!</span>
    </div> 
</div>       
			<script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous">
            </script>
            <script src="{{asset('js/main.js')}}"></script>
            <script src="{{asset('js/Tables/overview.js')}}"></script> 
@endsection