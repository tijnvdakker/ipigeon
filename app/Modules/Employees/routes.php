<?php
use App\Modules\Employees\Controllers\EmployeeController;

Route::middleware('role:Admin')->group(function () {
	Route::get('/employees/overview', [EmployeeController::class, 'overview']);

	Route::get('/employees/details/{id}', [EmployeeController::class, 'details']);

	Route::post('/employees/employee_active', [EmployeeController::class, 'active']);
})
?>