<?php
use App\Modules\Settings\Controllers\SettingsController;

Route::middleware('role:Admin')->group(function () {
	Route::get('/settings/overview', [SettingsController::class, 'overview']);
})
?>
