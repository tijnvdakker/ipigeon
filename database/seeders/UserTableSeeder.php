<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'username'     => 'tijnvdakker',
        	'email'    => 'akker2005@outlook.com',
            'name' => 'Tijn',
        	'password' => Hash::make('tijn1234'),
            'role_id' => 1,
    	]);
        DB::table('users')->insert([
            'username'     => 'pienvdakker',
            'email'    => 'pien2007@outlook.com',
            'name' => 'Pien',
            'password' => Hash::make('pien1234'),
            'role_id' => 2,
        ]);
        DB::table('users')->insert([
            'username'     => 'hansvdakker',
            'email'    => 'hans1976@outlook.com',
            'name' => 'Hans',
            'password' => Hash::make('hans1234'),
            'role_id' => 3,
        ]);
    }
}
