<?php

namespace App\Modules\Reservations\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Reservations\Models\ReservationModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{

    //Show overview
    public function overview()
    {
        $reservations = viewDate(ReservationModel::All());
        $reservations_today = ReservationModel::getTodaysReservations();
        
        return view('Reservations::overview', ['reservations' => $reservations, 
                                               'reservations_today'=>$reservations_today]);
    }

    //Show add
    public function add() {
        return view('Reservations::add');
    }

    //Show edit
    public function edit($id) {
        $reservation =  ReservationModel::findorfail($id);
        return view('Reservations::edit', ['reservation'=>$reservation]);
    }

    //Create new reservation
    public function create(Request $request) {
        $request->validate([
            'name'=>'required',
            'date'=>'required',
            'table_number'=>'required'
        ]);

        $reservation = new ReservationModel([
            'name'=>$request->get('name'),
            'date'=>$request->get('date'),
            'table_number'=>$request->get('table_number')
        ]);
        $reservation->save();
        return redirect('/reservations/overview');
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
}