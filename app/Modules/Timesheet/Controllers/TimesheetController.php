<?php

namespace App\Modules\Timesheet\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Timesheet\Models\TimesheetModel;
use App\Modules\Timesheet\Models\HourStatusModel;
use Illuminate\Support\Facades\Auth;
use App\Modules\Employees\Models\EmployeeModel;
use App\Models\User;
use Carbon\Carbon;

class TimesheetController extends Controller
{

    //Show overview
    public function hours($date_difference)
    {
        $date = differenceToDate($date_difference);

        $hours = TimesheetModel::getHoursForMonth($date->format('Y-m'), Auth::user()->id);

        TimesheetModel::getTotal($hours);
        $total_hours = TimesheetModel::getTotalTime($hours);
        TimesheetModel::format($hours);

        return view('Timesheet::hours', ['hours' => $hours, 'month'=>$date->format('Y-m'), 'total' => $total_hours]);
    }

    public function overview($date_difference) {
        \Illuminate\Support\Facades\App::setLocale('nl');
        $date = differenceToDate($date_difference);

        $hours = TimesheetModel::getHoursForMonth($date->format('Y-m'));

        $employees = EmployeeModel::all();

        $users = User::all();

    	TimesheetModel::getTotal($hours);
        TimesheetModel::format($hours);
        
    	return view('Timesheet::overview', ['hours'=>$hours, 'users'=>$users, 'month'=>$date->format('Y-m')]);
    }

    public function add() {
        return view('Timesheet::add');
    }

    public function create(Request $request) {
        $request->validate([
            'date'=>'required|date',
            'time_from'=>'required|before:time_to',
            'time_to'=>'required|after:time_from',
            'task' => 'required'
        ]);

        $hours = new TimesheetModel([
            'user_id' => Auth::user()->id,
            'date'=>$request->get('date'),
            'time_from' => $request->get('time_from'),
            'time_to' => $request->get('time_to'),
            'task' => $request->get('task'),
            'employee_edit'=>1,
        ]);
        $hours->save();
        return redirect('/timesheet/hours/' . dateToDifference(Carbon::now()));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'date'=>'required|date',
            'time_from'=>'required',
            'time_to'=>'required',
            'task' => 'required',
        ]);

        $hour = TimesheetModel::findorfail($id);

        if ($request->user()->cannot('update', $hour)) {
            abort(403);
        }

        $hour->date = $request->get('date');
        $hour->time_from = $request->get('time_from');
        $hour->time_to = $request->get('time_to');
        $hour->task = $request->get('task');

        //If user is employee and hour has not been paid yet, reset status to pending after editing hour.
        if (!Auth::user()->isAdmin() && !$hour->status_id == 4) { 
            $hour->status_id = 1;
        }

        $hour->save();

        if (Auth::user()->isAdmin()) {
            return redirect('/timesheet/overview/' . dateToDifference(Carbon::now()));
        } else {
            return redirect('/timesheet/hours/' . dateToDifference(Carbon::now()));
        }
    }

    public function edit(Request $request, $id) {
        $hour = TimesheetModel::findorfail($id);

        if ($request->user()->cannot('update', $hour)) {
            abort(403);
        }

        return view('Timesheet::edit', ['hour'=>$hour]);
    }

    public function change_hour_status(Request $request) {
        $request->validate([
            'value'=>'in:Pending,Approved,Under revision,Paid',
        ]);

        $id = $request->get('id');
        $hour = TimesheetModel::findorfail($id);

        if (!Auth::user()->isAdmin()) {
           abort(403);
        }

        $hour->status_id = HourStatusModel::where('name', $request->get('value'))->firstOrFail()->id;
        $hour->save();
        return response()->json(['success'=>$id]);
    }

    public function get_hours_for_month(Request $request) {
        $request->validate([
            'month'=>'required'
        ]);

        $date_difference = dateToDifference($request->get('month'));
        return response()->json(['url'=>$date_difference]);
    }

    public function change_employee_hour_edit_right(Request $request) {
        $id = $request->get('id'); 
        $hour = TimesheetModel::findorfail($id);
        $hour->employee_edit = $request->get('value');
        $hour->save();

        return response()->json(['success'=>$id]);
    }

    public function change_employee_month_edit_rights(Request $request) {
        $user_id = $request->get('user_id');
        $month = $request->get('month');
        $allow_edit = $request->get('allow_edit');

        $hours = TimesheetModel::getHoursForMonth($month, $user_id);

        foreach($hours as $hour) {
            $hour->employee_edit = $allow_edit;
            $hour->save();
        }
        return response()->json(['success'=>$user_id]);
    }
}