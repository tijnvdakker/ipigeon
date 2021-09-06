<?php

namespace App\Modules\Orders\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Modules\Products\Models\ProductModel;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $fillable = [
    		'name',
    		'table_number'
    ];

    protected $products = [];

    public function getProducts()
    {
        return $this->belongsToMany(ProductModel::class, 'order_product', 'order_id', 'product_id')->withPivot('prepared');

    }

    public function findProduct($product_id) {
        $products = $this->getProducts;
        foreach ($products as $product) {
            if ($product->id == $product_id) {
                return $product;
            }
        }
    }

    public static function updateOrderProductStatus($order_id, $product_id, $prepared) {
        $order = self::findorfail($order_id);
        $order->getProducts()->updateExistingPivot($product_id, array('prepared' => $prepared), false);
    }

    public static function setProductField($orders) {
        foreach ($orders as $order) {
            $order->getProducts; //Make get_product function available in javascript;
        }
    }

    public static function createTablesFromOrders($orders) {
        $order_tables = [];
        foreach ($orders as $order) {
            $tableBuilder = new \App\Modules\TableBuilderNew('No products');
            $tableBuilder->setClass('pigeon-table col-2');
            $tableBuilder->addColumn('name', 'Name');
            $tableBuilder->addColumn('price', 'Price');
            $tableBuilder->setRows($order->getProducts);
            array_push($order_tables, $tableBuilder->getTable());
        }
        return $order_tables;
    }
}