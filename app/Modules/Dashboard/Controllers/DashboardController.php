<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Reservations\Models\ReservationModel;
use App\Modules\Orders\Models\OrderModel;
use App\Modules\Employees\Models\EmployeeModel;

class DashboardController extends Controller
{

    public function overview()
    {
    	$reservations = ReservationModel::all();
    	$orders = OrderModel::all();
    	$active_employees = EmployeeModel::where('active', 1)->get();
        return view('Dashboard::overview', ['reservations'=>$reservations,
    										'orders'=>$orders,
    									    'active_employees'=>$active_employees]);
    }
}