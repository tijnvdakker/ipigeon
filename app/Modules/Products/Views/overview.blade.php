@extends('layout.main') 
@section('content')
<?php
$pageHeader = new pageHeader("<span class='las la-cubes'></span> Products", ['Add'=>'/products/add']);
$pageHeader->addSubTitle("Total products " . count($products));
echo $pageHeader->render();
?>
            <div class="card-large"> 
                <div class="card-title">
                    <h3>Products</h3>
                </div>
                <div class="table-container"> 
                    <?php

                    /*TableBuilder::render($products, 
                    [
                    'tableColumns' => [
                        'name' => 'Name', 
                        'category' => 'Category',
                        'price' => 'Price'
                    ],
                    'tableAttributes' => [
                        'tableId' => 'product_table',
                        'tableName' => 'product_table',
                        'tableClass' =>'pigeon-table col5'
                    ]
                    ],
                    "/products/edit/",
                    "/products/details/"
                    );*/
                    $tableBuilder = new App\Modules\TableBuilderNew('No products found!');
                    $tableBuilder->setClass('pigeon-table col5');
                    $tableBuilder->setName('product_table');
                    $tableBuilder->setId('product_table');

                    $tableBuilder->addColumn('name', 'Name');
                    $tableBuilder->addColumn('category', 'Category');
                    $tableBuilder->addColumn('price', 'Price', new prefixFormatter('&euro;'));

                    $tableBuilder->setEditUrl('/products/edit/');
                    $tableBuilder->setDetailsUrl('/products/details/');

                    $tableBuilder->setRows($products);

                    echo $tableBuilder->getTable();
                    ?>
                </div> 
            </div> 
@endsection