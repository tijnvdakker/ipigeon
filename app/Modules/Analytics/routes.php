<?php
use App\Modules\Analytics\Controllers\AnalyticsController;

Route::middleware('role:Admin')->group(function () {

	Route::get('/analytics/overview', [AnalyticsController::class, 'overview']);

})
?>
