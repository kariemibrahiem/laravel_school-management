<?php

use Illuminate\Database\Seeder;

class sectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $grade = \App\Models\Grade::first();
//        $grade_2 = \App\Models\Grade::latest();
        $class = \App\Models\ClassRoom::first();
//        $class_2 = \App\Models\ClassRoom::latest();


        \App\Models\Sections::create([
            "Name_Section" => "seed section",
            "class_id" => $class->id,
            "grade_id" => $grade->id
        ]);
        \App\Models\Sections::create([
            "Name_Section" => "seed section 2",
            "class_id" => $class->id+1,
            "grade_id" => $grade->id+1
        ]);
    }
}
