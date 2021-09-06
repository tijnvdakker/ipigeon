@extends('layout.main') 
@section('content')
<?php
$pageHeader = new pageHeader("<span class='las la-calendar'></span> Reservations", ['Add'=>'/reservations/add']);
$pageHeader->addSubTitle("Reservations today: " . $reservations_today);
echo $pageHeader->render();
?>
            <div class="card-large"> 
                <div class="card-title">
                    <h3>Approved reservations:</h3>
                </div>
                <div class="reservation-table-container"> 
                    <?php
                    
                    $tableBuilder = new App\Modules\TableBuilderNew('No reservations found!');
                    $tableBuilder->setClass('pigeon-table col5');
                    $tableBuilder->setName('reservation_table');
                    $tableBuilder->setId('reservation_table');

                    $tableBuilder->addColumn('table_number', 'Table');
                    $tableBuilder->addColumn('name', 'Name');
                    $tableBuilder->addColumn('date', 'Day');

                    $tableBuilder->setEditUrl('/reservations/edit/');
                    $tableBuilder->setDetailsUrl('/reservations/details/');

                    $tableBuilder->setRows($reservations);

                    echo $tableBuilder->getTable();

                    ?>
                </div> 
            </div> 
@endsection