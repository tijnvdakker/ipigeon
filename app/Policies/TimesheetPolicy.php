<?php

namespace App\Policies;

use App\Models\User;
use App\Modules\Timesheet\Models\TimesheetModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimesheetPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, $hour) {
        return ($user->id === $hour->user_id && $hour->employee_edit) || $user->isAdmin();
    }
}
