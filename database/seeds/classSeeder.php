<?php

use Illuminate\Database\Seeder;

class classSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $grade = \App\Models\Grade::latest()->first();
        \App\Models\ClassRoom::create([
            "className" => "seed class",
            "grade_id" => $grade->id
        ]); \App\Models\ClassRoom::create([
            "className" => "seed class 2",
            "grade_id" => $grade->id+1
        ]);

    }
}
