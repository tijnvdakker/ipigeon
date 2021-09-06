<?php

namespace App\Modules\Employees\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Employees\Models\EmployeeModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{

    //Show overview
    public function overview()
    {
        $employees = EmployeeModel::All();
        return view('Employees::overview', ['employees' => $employees]);
    }

    public function details($id) {
        $employee = EmployeeModel::findorfail($id);
        return view('Employees::details', ['employee'=>$employee]);
    }

    public function active(Request $request) {
        $id = $request->get('id'); 
        $employee = EmployeeModel::findorfail($id);
        $employee->active = $request->get('value');
        $employee->save();

        return response()->json(['success'=>$id]);
    }
}