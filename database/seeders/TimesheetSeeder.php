<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimesheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timesheet')->insert([
        	'user_id'     => 1,
        	'date'    => '2021-05-04',
        	'time_from' => '14:00',
            'time_to' => '18:00',
            'status_id' => '1', 
            'task' => 'Management',
            'employee_edit' => 1,
    	]);
    	DB::table('timesheet')->insert([
        	'user_id'     => 1,
        	'date'    => '2021-03-04',
        	'time_from' => '12:00',
            'time_to' => '18:00',
            'status_id' => '1', 
            'task' => 'Management',
            'employee_edit' => 1,
    	]);
    	DB::table('timesheet')->insert([
        	'user_id'     => 2,
        	'date'    => '2021-05-01',
        	'time_from' => '14:30',
            'time_to' => '18:45',
            'status_id' => '2', 
            'task' => 'Ordering',
            'employee_edit' => 1,
    	]);
    	DB::table('timesheet')->insert([
        	'user_id'     => 3,
        	'date'    => '2021-05-11',
        	'time_from' => '09:00',
            'time_to' => '17:00',
            'status_id' => '2', 
            'task' => 'Cashier',
            'employee_edit' => 0,
    	]);
        DB::table('timesheet')->insert([
            'user_id'     => 2,
            'date'    => '2021-05-11',
            'time_from' => '09:00',
            'time_to' => '17:00',
            'status_id' => '2', 
            'task' => 'Cashier',
            'employee_edit' => 0,
        ]);
        DB::table('timesheet')->insert([
            'user_id'     => 2,
            'date'    => '2021-05-01',
            'time_from' => '09:00',
            'time_to' => '17:00',
            'status_id' => '2', 
            'task' => 'Cashier',
            'employee_edit' => 0,
        ]);
        DB::table('timesheet')->insert([
            'user_id'     => 2,
            'date'    => '2021-05-23',
            'time_from' => '09:00',
            'time_to' => '19:30',
            'status_id' => '2', 
            'task' => 'Cashier',
            'employee_edit' => 0,
        ]);
        DB::table('timesheet')->insert([
            'user_id'     => 2,
            'date'    => '2021-05-11',
            'time_from' => '03:00',
            'time_to' => '12:00',
            'status_id' => '2', 
            'task' => 'Cashier',
            'employee_edit' => 0,
        ]);
    }
}
