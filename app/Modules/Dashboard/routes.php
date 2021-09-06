<?php
use App\Modules\Dashboard\Controllers\DashboardController;

Route::middleware('role:Admin')->group(function () {

	Route::get('/dashboard/overview', [DashboardController::class, 'overview']);

})
?>
