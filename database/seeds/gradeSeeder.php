<?php

use Illuminate\Database\Seeder;

class gradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \App\Models\Grade::truncate();


        \App\Models\Grade::create([
            "name" => "seed grade",
            "notes" => "desc of main grade"
        ]);
        \App\Models\Grade::create([
            "name" => "seed grade 2",
            "notes" => "desc of main grade 2"
        ]);
    }
}
