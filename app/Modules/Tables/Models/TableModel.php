<?php

namespace App\Modules\Tables\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Orders\Models\OrderModel;
use Carbon\Carbon;

class TableModel extends Model
{
    protected $table = 'tables';
    protected $fillable = [
    		'table_number',
    		'reservation_id'
    ];

    public function orders() {
    	return $this->hasMany(OrderModel::class, 'table_number', 'table_number');
    }
}