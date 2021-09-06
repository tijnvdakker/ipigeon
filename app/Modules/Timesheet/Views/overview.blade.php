@extends('layout.main') 
@section('content')
<?php
$pageHeader = new pageHeader("<span class='las la-user-clock'></span> Timesheet");
echo $pageHeader->render();
?>
    <div class="filter">
        <!--<input type="text" placeholder="Search..." class="filter-search">-->
        <input style="text-transform:capitalize;" type="month" placeholder="Enter month..." id="month-input" class="filter-search" value={{$month}}>
    </div>
    <?php foreach($users as $user) { ?>
        <div class="card-large"> 
            <div class="card-title">
                {{ $user->username }} 

                <div class="actions" style="margin-left:60%">
                    <div class="tooltip">
                        <button data-user-id="{{$user->id}}" data-type="enable" class="rounded-button" data-month={{$month}} style="margin-left:2rem"><span class="las la-check"></span></button>
                        <span class="tooltiptext">Enable all employee edit rights for this month</span>
                    </div>
                    <div class="tooltip">
                        <button data-user-id="{{$user->id}}" data-type="disable" class="rounded-button" data-month={{$month}} style="margin-left:2rem"><span class="las la-times"></span></button>
                        <span class="tooltiptext">Disable all employee edit rights for this month</span>
                    </div>
                </div>

            </div>
            <div class="table-container">
                <?php
                $employee_hours = $user->getHoursForMonth($month);

                $tableBuilder = new App\Modules\TableBuilderNew('No hours');
                $tableBuilder->setClass('pigeon-table col9');
                $tableBuilder->setName('timesheet-table');
                $tableBuilder->setId($user->id);

                $tableBuilder->addColumn('date', 'Date');
                $tableBuilder->addColumn('time_from', 'From');
                $tableBuilder->addColumn('time_to', 'To');
                $tableBuilder->addColumn('total', 'Total', new suffixFormatter('h'));
                $tableBuilder->addColumn('task', 'Task');
                $tableBuilder->addColumn('status', 'Status', new dropdownFormatter(['Pending', 'Under revision', 'Approved', 'Paid']));
                $tableBuilder->addColumn('employee_edit', 'Employee edit rights', new switchFormatter());
                    
                $tableBuilder->setEditUrl('/timesheet/edit/');
                //$tableBuilder->addTotals(['Total hours: ' => 7]);
                $tableBuilder->setRows($employee_hours);
                echo $tableBuilder->getTable();
                ?>
            </div>
            <div class="totals" style="font-size:0.8rem; width:100%; margin-top: 1.5rem; background:#f1f5f9; font-weight:bold; padding:10px; display:flex; justify-content:center;">
                Total time worked this month ({{Carbon\Carbon::parse($month)->format('m-Y')}}) : {{$user->getTotal($month)}} hours
            </div>
        </div>
    <?php } ?>  
@endsection