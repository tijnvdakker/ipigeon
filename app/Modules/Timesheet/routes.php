<?php
use App\Modules\Timesheet\Controllers\TimesheetController;

Route::middleware('role:Admin')->group(function () {
	Route::get('/timesheet/overview/{date}', [TimesheetController::class, 'overview']);
});

Route::get('/timesheet/hours/{date}', [TimesheetController::class, 'hours']);

Route::get('/timesheet/add', [TimesheetController::class, 'add']);

Route::post('/timesheet/add', [TimesheetController::class, 'create']);

Route::get('/timesheet/edit/{id}', [TimesheetController::class, 'edit']);

Route::post('/timesheet/edit/{id}', [TimesheetController::class, 'update']);

Route::post('/timesheet/hour_status', [TimesheetController::class, 'change_hour_status']);

Route::post('/timesheet/month_select', [TimesheetController::class, 'get_hours_for_month']);

Route::post('/timesheet/change_employee_hour_edit_right', 
	[TimesheetController::class, 'change_employee_hour_edit_right']);

Route::post('/timesheet/change_employee_month_edit_rights', 
	[TimesheetController::class, 'change_employee_month_edit_rights']);

?>