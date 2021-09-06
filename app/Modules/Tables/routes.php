<?php
use App\Modules\Tables\Controllers\TableController;

Route::get('/tables/overview', [TableController::class, 'overview']);
?>