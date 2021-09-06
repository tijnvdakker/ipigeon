<?php

namespace App\Models;

use App\Modules\Timesheet\Models\TimesheetModel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'name',
        'password',
        'role_id'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin() {
        return $this->role->id == 1;
    }

    public function isEmployee() {
        return $this->role->id !== 1;
    }

    public function hasRole($role)
    {
        return $this->role->name == $role;
    }

    public function getHoursForMonth($month) {
        $hours = TimesheetModel::getHoursForMonth($month, $this->id);
        TimesheetModel::getTotal($hours);
        TimesheetModel::format($hours);
        return $hours;
    }

    public function getTotal($month) {
        $hours = $this->getHoursForMonth($month);
        $total = 0;
        foreach ($hours as $hour) {
            $total += $hour->total;
        }    
        return $total;
    }
}
