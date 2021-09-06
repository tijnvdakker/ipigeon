<?php

namespace App\Modules\Timesheet\Models;

use App\Modules\Timesheet\Models\HourStatusModel;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TimesheetModel extends Model
{
    protected $table = 'timesheet';
    protected $fillable = [
    		'user_id',
    		'date',
    		'time_from',
    		'time_to',
    		'status_id',
    		'task',
            'employee_edit'
    ];

    public function status() {
        return $this->belongsTo(HourStatusModel::class, 'status_id');
    }

    public static function getTotal($hours) {
    	foreach($hours as $hour) {
    		$start_time = Carbon::parse($hour->time_from);
    		$end_time = Carbon::parse($hour->time_to);

    		$hours = $end_time->diffInHours($start_time); //Get difference in hours
    		$minutes = $end_time->diffInMinutes($start_time) % 60 / 60; //Get difference in minutes, convert to fraction of hour

    		$hour->total = round($hours + $minutes, 2);
    	}
    }

    public static function format($hours) {
    	foreach($hours as $hour) {
            $hour->date = Carbon::parse($hour->date)->format('d-m-Y');
    		$hour->time_from = Carbon::parse($hour->time_from)->format('H:i');
    		$hour->time_to = Carbon::parse($hour->time_to)->format('H:i');

            $hour->status_span_class = $hour->status->span_class; //Get class from relation with hour status
            $hour->status = $hour->status->name; //Get status name and set as our models status
    	} 
    }

    public static function getHoursForMonth($month, $user_id = null) {
        if ($user_id) {
            $hours = self::where('user_id', $user_id)->get();
        } else {
            $hours = self::all();
        }
        $month_hours = [];

        foreach ($hours as $hour) {
            $hour_month = Carbon::parse($hour->date)->format('Y-m');
            if ($hour_month == $month) {
                array_push($month_hours, $hour);
            }
        }

        return $month_hours;
    }

    public static function getTotalTime($hours) {
        $total = 0;
        foreach ($hours as $hour) {
            $total += $hour->total;
        }
        return $total;
    }
}