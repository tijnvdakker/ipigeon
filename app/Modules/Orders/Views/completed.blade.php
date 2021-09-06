@extends('layout.main') 
@section('content')
<?php
$pageHeader = new pageHeader("<span class='las la-clipboard-check'></span> Completed orders", ['Add'=>'/orders/add']);
$pageHeader->addSubTitle("Orders");
echo $pageHeader->render();
?>
        <div class="cards">
            <?php foreach($orders as $order) {
                ?>
                    <div class="card-single">
                        <div class="card-head">
                            {{ $order->name }} <br>
                            Table number: {{ $order->table_number }}
                        </div>
                        
                            <div class="table-container">
                            <?php

                            $tableBuilder = new App\Modules\TableBuilderNew("No pending orders!");
                            $tableBuilder->setClass('pigeon-table col3');
                            $tableBuilder->setName('order_table');

                            $tableBuilder->addColumn('name', 'Name');
                            $tableBuilder->addColumn('price', 'Price');

                            $tableBuilder->setRows($order->getProducts);
                            echo $tableBuilder->getTable();
                            ?>
                            
                            </div>
                            <a style="display: inline-block; margin-top: 2rem;" class='primary-button' href="/orders/edit/{{$order->id}}">Details</a>
                        
                    </div>
                <?php
            }
            ?>
@endsection