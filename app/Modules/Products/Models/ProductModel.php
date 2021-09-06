<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Modules\Orders\Models\OrderModel;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $fillable = [
    		'name',
    		'price',
    		'category'
    ];

    public function orders() {
        return $this->belongsToMany(OrderModel::class)->withPivot('prepared');
    }
}