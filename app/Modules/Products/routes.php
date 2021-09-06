<?php
use App\Modules\Products\Controllers\ProductController;

Route::middleware('role:Admin')->group(function () {

	Route::get('/products/overview', [ProductController::class, 'overview']);

	Route::get('/products/add', [ProductController::class, 'add']);

	Route::post('/products/add', [ProductController::class, 'create']);

	Route::get('/products/edit/{id}', [ProductController::class, 'edit']);

	Route::post('/products/edit/{id}', [ProductController::class, 'update']);

	Route::get('/products/details/{id}', [ProductController::class, 'details']);

	Route::get('/products/delete/{id}', [ProductController::class, 'delete']);

	Route::get('/products/jq_get_products', [ProductController::class, 'jq_get_products']);
})
?>