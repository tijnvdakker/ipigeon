<?php

namespace App\Modules\Reservations\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ReservationModel extends Model
{
    protected $table = 'reservations';
    protected $fillable = [
    		'name',
    		'date',
    		'table_number'
    ];

    public static function getTodaysReservations() {
    	$count = 0;
    	foreach (Self::All() as $reservation) {
    		if ($reservation->date == Carbon::now()->toDateString()) {
                $count++;
            }
    	}
    	return $count;
    }
}