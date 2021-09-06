<?php

namespace App\Modules\Products\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Products\Models\ProductModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    //Show overview
    public function overview()
    {
        $products = ProductModel::all();   
        return view('Products::overview', ['products' => $products]);
    }

    //Show add
    public function add() {
        return view('Products::add');
    }

    //Show edit
    public function edit($id) {
        $product =  ProductModel::findorfail($id);
        return view('Products::edit', ['product'=>$product]);
    }

    //Create new reservation
    public function create(Request $request) {
        $request->validate([
            'name'=>'required',
            'category'=>'required',
            'price'=>'required'
        ]);

        $product = new ProductModel([
            'name'=>$request->get('name'),
            'category'=>$request->get('category'),
            'price'=>$request->get('price')
        ]);
        $product->save();
        return redirect('/products/overview');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name'=>'required',
            'date'=>'required',
            'table_number'=>'required'
        ]); 
        $reservation = ReservationModel::findorfail($id);
        $reservation->name = $request->get('name');
        $reservation->date = $request->get('date');
        $reservation->table_number = $request->get('table_number');
        $reservation->save();
        return redirect('/reservations/overview');
    }

    public function details($id) {
        $reservation = ReservationModel::findorfail($id);
        return view('Reservations::details', ['reservation'=>$reservation]);
    }

    public function delete($id) {
        ReservationModel::destroy($id);
        return redirect('/reservations/overview');
    }

    public function jq_get_products(Request $request) {
        //die();

        $products = ProductModel::where('name', 'like', '%' . $request->get('term') . '%')->get();;
        //$products = ProductModel::all();

        return response()->json(['items' => $products, 'term'=>$request->get('term')]);
    }
}