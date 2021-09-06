<?php

namespace App\Modules\Timesheet\Models;

use Illuminate\Database\Eloquent\Model;

class HourStatusModel extends Model
{
    protected $table = 'hour_status';
    protected $fillable = [
        'name',
    	'span_class'
    ];
}