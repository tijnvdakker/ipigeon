<?php
use App\Modules\Orders\Controllers\OrderController;

Route::middleware('role:Waiter')->group(function () {
	Route::get('/orders/pending', [OrderController::class, 'pending']);

	Route::get('/orders/completed', [OrderController::class, 'completed']);

	Route::get('/orders/per_table', [OrderController::class, 'per_table']);

	Route::get('/orders/add', [OrderController::class, 'add'])->middleware("web");

	Route::post('/orders/add', [OrderController::class, 'create']);

	Route::get('/orders/edit/{id}', [OrderController::class, 'edit']);

	Route::post('/orders/edit/{id}', [OrderController::class, 'update']);

	Route::get('/orders/details/{id}', [OrderController::class, 'details']);

	Route::get('/orders/overview', [OrderController::class, 'overview']);

	Route::get('/orders/delete/{id}', [OrderController::class, 'delete']);

	Route::post('/orders/edit_order_product_status', [OrderController::class, 'edit_order_product_status']);

	Route::get('/orders/complete_order/{id}', [OrderController::class, 'complete_order']);

	Route::post('/orders/retrieve_orders', [OrderController::class, 'retrieve_orders']);
})
?>