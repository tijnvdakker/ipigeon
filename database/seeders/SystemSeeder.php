<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Reservations
        DB::table('reservations')->insert([
            'name' => "Tijn van den Akker",
            'date' => "2021-05-04",
            'table_number' => 5,
        ]);
        DB::table('reservations')->insert([
            'name' => "Nienke Esmeijer",
            'date' => "2021-05-06",
            'table_number' => 2,
        ]);
        DB::table('reservations')->insert([
            'name' => "John Doe",
            'date' => "2021-05-12",
            'table_number' => 13,
        ]);

        //Orders
        DB::table('orders')->insert([
            'name' => "Hansie",
            'table_number' => 9,
            'completed'=>0,
        ]);
        DB::table('orders')->insert([
            'name' => "Willem",
            'table_number' => 3,
            'completed'=>0,
        ]);
        DB::table('orders')->insert([
            'name' => "SonicMaster",
            'table_number' => 7,
            'completed'=>0,
        ]);
        DB::table('orders')->insert([
            'name' => "Van Dalen",
            'table_number' => 8,
            'completed'=>0,
        ]);
        DB::table('orders')->insert([
            'name' => "Johny",
            'table_number' => 14,
            'completed'=>0,
        ]);

        //Employees
        DB::table('employees')->insert([
            'first_name' => "John",
            'last_name' => "Doe",
            'email' => "johndoe@gmail.com",
            'gender' => "Male",
            'birth_date' => "2005-09-04",
            'address' => "Brucknerstraat 5",
            'active' => "1"
        ]);
        DB::table('employees')->insert([
            'first_name' => "Jane",
            'last_name' => "Owen",
            'email' => "janedoe@gmail.com",
            'gender' => "Female",
            'birth_date' => "2005-11-24",
            'address' => "Hoofdstraat 46A",
            'active' => "0"
        ]);
        DB::table('employees')->insert([
            'first_name' => "Hans",
            'last_name' => "van den Akker",
            'email' => "hans@gmail.com",
            'gender' => "Male",
            'birth_date' => "1976-12-09",
            'address' => "Brucknerstraat 5",
            'active' => "1"
        ]);
        DB::table('employees')->insert([
            'first_name' => "Nienke",
            'last_name' => "Esmeijer",
            'email' => "nienke@gmail.com",
            'gender' => "Female",
            'birth_date' => "1978-06-22",
            'address' => "Brucknerstraat 5",
            'active' => "1"
        ]);
        DB::table('employees')->insert([
            'first_name' => "Pien",
            'last_name' => "van Dalen",
            'email' => "pien@gmail.com",
            'gender' => "Female",
            'birth_date' => "2003-09-01",
            'address' => "Pompstraat 7B",
            'active' => "0"
        ]);

        //Products
        DB::table('products')->insert([
            'name' => "Tomato Soup",
            'price' => "5.95",
            'category' => "Starter"
        ]);
        DB::table('products')->insert([
            'name' => "Sprite",
            'price' => "1.99",
            'category' => "Drink"
        ]);
        DB::table('products')->insert([
            'name' => "Sandwich",
            'price' => "3.05",
            'category' => "Main"
        ]);
        DB::table('products')->insert([
            'name' => "Chicken and Fries",
            'price' => "12.99",
            'category' => "Main"
        ]);
        DB::table('products')->insert([
            'name' => "French Fries",
            'price' => "5.05",
            'category' => "Extra"
        ]);


        //Order Product 
        for ($i = 0; $i < 6; $i++) {
            for ($j = 0; $j < 5; $j++) {
                DB::table('order_product')->insert([
                    'order_id' => $i,
                    'product_id' => $j,
                    'prepared' => 0
                ]);
            }
        }

        DB::table('tables')->insert([
            'table_number' => 1,
            'reservation_id' => 1
        ]);
        DB::table('tables')->insert([
            'table_number' => 2,
            'reservation_id' => 2
        ]);
        DB::table('tables')->insert([
            'table_number' => 3,
            'reservation_id' => 3
        ]);
        DB::table('tables')->insert([
            'table_number' => 4,
            'reservation_id' => 4
        ]);
         DB::table('tables')->insert([
            'table_number' => 5,
            'reservation_id' => 5
        ]);
        DB::table('tables')->insert([
            'table_number' => 6,
            'reservation_id' => 6
        ]);
        DB::table('tables')->insert([
            'table_number' => 7,
            'reservation_id' => 7
        ]);
        DB::table('tables')->insert([
            'table_number' => 8,
            'reservation_id' => 8
        ]);
        DB::table('tables')->insert([
            'table_number' => 9,
            'reservation_id' => 9
        ]);

        DB::table('hour_status')->insert([
            'name' => "Pending",
            'span_class'=>"pending",
        ]);

        DB::table('hour_status')->insert([
            'name' => "Under revision",
            'span_class'=>'under-revision',
        ]);

        DB::table('hour_status')->insert([
            'name' => "Approved",
            'span_class'=>'approved',
        ]);

        DB::table('hour_status')->insert([
            'name' => "Paid",
            'span_class'=>'paid',
        ]);
    }
}
