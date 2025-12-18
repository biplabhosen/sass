<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("customers")-> insert([
            "name" => "Obayda",
            "email" => "Obayda@eiv.com",
            "phone" => "0255663658",
            "address" => "Palestine",
            "photo" => "Obayda.jpg",
        ]);
    }
}
