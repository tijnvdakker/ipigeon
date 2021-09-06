@extends('layout.main') 
@section('content')
<?php
$pageHeader = new pageHeader("<span class='las la-clipboard-list'></span> Pending orders", ['Add'=>'/orders/add']);
$pageHeader->addSubTitle("Orders");
echo $pageHeader->render();
?>
        <div class="cards">
            <?php foreach($orders as $order) {
                ?>
                    <div class="card-single">
                        <div class="card-head" style='margin-bottom: 2rem'>
                            {{ $order->name }} <br>
                            Table number: {{ $order->table_number }}
                        </div>
                        
                            <div class="table-container">
                            <?php

                            $tableBuilder = new App\Modules\TableBuilderNew("No pending orders!");
                            $tableBuilder->setClass('pigeon-table col3');
                            $tableBuilder->setName('order_table');
                            $tableBuilder->setId($order->id);

                            $tableBuilder->addColumn('name', 'Name');
                            $tableBuilder->addColumn('price', 'Price');
                            $tableBuilder->addColumn('prepared', 'Ready', new switchFormatter());

                            $tableBuilder->setRows($order->getProducts);
                            echo $tableBuilder->getTable();
                            ?>

                            </div>
                            <div style="display:flex; justify-content: center; margin-top: 2rem">
                            <a style="display: inline-block" class='primary-button' href="/orders/complete_order/{{$order->id}}" 
                                onclick="return confirm('Are you sure you want to complete this order?')">
                            <span class='las la-clipboard-check'></span>
                            
                            </a>
                            </div>
                        
                    </div>
                <?php
            }
            ?>
        </div>
            <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous">
            </script>
            <script src="{{asset('js/main.js')}}"></script>
            <script src="{{asset('js/Orders/pending.js')}}"></script>
@endsection