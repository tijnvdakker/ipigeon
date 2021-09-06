@extends('layout.main') 
@section('content')
<?php
$pageHeader = new pageHeader("<span class='las la-users'></span> Employees");
$pageHeader->addSubTitle("Employees active: ");
echo $pageHeader->render();
?>
            <div class="card-large"> 
                <div class="card-title">
                    <h3>Employees</h3>
                </div>
                <div class="table-container"> 
                    <?php
                    $tableBuilder = new App\Modules\TableBuilderNew('No employees');
                    $tableBuilder->setClass('pigeon-table col4');

                    $tableBuilder->addColumn('first_name', 'First name');
                    $tableBuilder->addColumn('last_name', 'Last name');
                    $tableBuilder->addColumn('active', 'Active', new switchFormatter());
                    
                    $tableBuilder->setDetailsUrl('/employees/details/');
                    $tableBuilder->setRows($employees);
                    echo $tableBuilder->getTable();
                    ?>
                </div> 
            </div> 
            <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous">
            </script>
            <script src="{{asset('js/main.js')}}"></script>
            <script src="{{asset('js/Employees/overview.js')}}"></script>
@endsection