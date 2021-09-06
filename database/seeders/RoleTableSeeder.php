<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
        	'name'     => 'Admin',
        	'description' => 'Admin all the pages',
    	]);
        DB::table('roles')->insert([
            'id' => 2,
            'name'     => 'Waiter',
            'description' => 'Take reservations',
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'name'     => 'Cashier',
            'description' => 'Make payments',
        ]);
    }
}
