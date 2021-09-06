@extends('layout.main') 
@section('content')
<?php
$pageHeader = new pageHeader("<span class='las la-user-clock'></span> My hours", ['Add'=>'/timesheet/add']);
echo $pageHeader->render();
?>
<div class="filter">
        <!--<input type="text" placeholder="Search..." class="filter-search">-->
        <input style="text-transform:capitalize" type="month" placeholder="Enter month..." id="month-input" class="filter-search" value={{$month}}>
</div>
<div class="card-large"> 
                <div class="card-title">
                    <h3>My hours</h3>
                </div>
                <div class="table-container">
                <?php 
                    $tableBuilder = new App\Modules\TableBuilderNew('No hours');
                    $tableBuilder->setClass('pigeon-table col7');

                    $tableBuilder->addColumn('date', 'Date');
                    $tableBuilder->addColumn('time_from', 'From');
                    $tableBuilder->addColumn('time_to', 'To');
                    $tableBuilder->addColumn('total', 'Total', new suffixFormatter('h'));
                    $tableBuilder->addColumn('task', 'Task');
                    $tableBuilder->addColumn('status', 'Status', 
                    new class extends Formatter {
                        public function format($model, $field) {
                            //echo $model->$field;
                            return "<span class='status $model->status_span_class'>" . $model->{$field} . "</span>";
                        }
                    });
                    
                    $tableBuilder->setEditUrl('/timesheet/edit/');
                    $tableBuilder->setRows($hours);
                    echo $tableBuilder->getTable();
                ?>
                </div>
                <div class="totals" style="font-size:0.8rem; width:100%; margin-top: 1.5rem; background:#f1f5f9; font-weight:bold; padding:10px; display:flex; justify-content:center;">
                Total time worked this month ({{Carbon\Carbon::parse($month)->formatLocalized('%m-%Y')}}) : {{$total}} hours
                </div>
</div>

@endsection