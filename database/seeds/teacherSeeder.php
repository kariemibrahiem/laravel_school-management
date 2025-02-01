<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class teacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        \App\Models\Teacher::truncate();
        $faker = Faker::create();

        $spech = \App\Models\Specialization::latest()->first();
        \App\Models\Teacher::create([
            "email" => "seedEmail@gmail.com",
            "password"=>123456789,
            "name" => "seedFather",
            "specialization_id" => $spech->id,
            "gander" => "male",
            "joining_date" => date('Y-m-d', mktime(0, 0, 0, 3, 23, 2020)),
            "address" =>" seedAdress"
        ]);
    }
}
