<?php

namespace App\Modules\Orders\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Orders\Models\OrderModel;
use App\Modules\Products\Models\ProductModel;
use App\Modules\Tables\Models\TableModel;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function pending()
    {
        $orders = OrderModel::where('completed', 0)->get();   
        foreach($orders as $order) {
            foreach ($order->getProducts as $product) {
                $product->prepared = $product->pivot->prepared;
            }
        }
        return view('Orders::pending', ['orders' => $orders]);
    }

    public function completed()
    {
        $orders = OrderModel::where('completed', 1)->get();   
        return view('Orders::completed', ['orders' => $orders]);
    }
    //Show add
    public function add() {
        $products = ProductModel::All();
        return view('Orders::add');
    }

    //Show edit
    public function edit($id) {
        $order =  OrderModel::findorfail($id);
        return view('Orders::edit', ['order'=>$order]);
    }

    //Create new reservation
    public function create(Request $request) {
        $request->validate([
            'name'=>'required',
            'table_number'=>'required'
        ]);

        dd($request->get('products'));
        die();

        $order = new OrderModel([
            'name'=>$request->get('name'),
            'table_number'=>$request->get('table_number')
        ]);
        $order->save();
        return redirect('/orders/pending');
    }
    public function update(Request $request, $id) {
        $request->validate([
            'name'=>'required',
            'table_number'=>'required'
        ]); 
        $order = OrderModel::findorfail($id);
        $order->name = $request->get('name');
        $order->table_number = $request->get('table_number');
        $order->save();
        return redirect('/orders/pending');
    }

    public function details($id) {
        $order = OrderModel::findorfail($id);
        return view('Orders::details', ['order'=>$order]);
    }

    public function delete($id) {
        OrderModel::destroy($id);
        return redirect('/orders/pending');
    }

    public function edit_order_product_status(Request $request) {
        $request->validate([
            'order_id'=>'required',
            'product_id'=>'required',
            'prepared'=>'required|in:0,1'
        ]);

        $order_id = $request->get('order_id');
        $product_id = $request->get('product_id');
        $prepared = $request->get('prepared');

        OrderModel::updateOrderProductStatus($order_id, $product_id, $prepared);

        return response()->json(['success'=>'Yah']);
    }

    public function complete_order(Request $request, $id) {
        $order = OrderModel::findorfail($id);
        $order->completed = true;
        $order->save();
        return redirect('/orders/pending');
    }

    public function overview() {
        //$order_tables = OrderModel::createTablesFromOrders(OrderModel::all());
        $tables = TableModel::all();
        return view('Orders::overview', ['tables'=>$tables]);
    }

    public function retrieve_orders(Request $request) {
        $request->validate([
            'table_number' => 'required'
        ]);

        $table = TableModel::where('table_number', $request->get('table_number'))->firstOrFail();

        $orders = $table->orders;

        $order_tables = OrderModel::createTablesFromOrders($orders);

        return response()->json(['orders'=>$order_tables]);
    }
}