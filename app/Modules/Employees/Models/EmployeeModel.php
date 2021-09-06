<?php

namespace App\Modules\Employees\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $fillable = [
    		'name',
    		'email',
    		'active'
    ];
}