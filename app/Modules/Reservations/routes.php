<?php
use App\Modules\Reservations\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::middleware('role:Cashier')->group(function () {
	Route::get('/reservations/overview', [ReservationController::class, 'overview']);

	Route::get('/reservations/add', [ReservationController::class, 'add'])->middleware("web");

	Route::post('/reservations/add', [ReservationController::class, 'create']);

	Route::get('/reservations/edit/{id}', [ReservationController::class, 'edit']);

	Route::post('/reservations/edit/{id}', [ReservationController::class, 'update']);

	Route::get('/reservations/details/{id}', [ReservationController::class, 'details']);

	Route::get('/reservations/delete/{id}', [ReservationController::class, 'delete']);
})
?>