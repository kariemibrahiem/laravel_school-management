<?php

use App\Models\ClassRoom;
use App\Models\Grade;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder {

	public function run()
	{

        user::truncate();
//        \App\Models\Grade::truncate();
//        \App\Models\ClassRoom::truncate();
//        \App\Models\Sections::truncate();


        $this->call([
            userSeeder::class,
            specializationSeeder::class,
            BloodSeeder::class,
            NationalitiesSeeder::class,
            ReligionSeeder::class,
            gradeSeeder::class,
            classSeeder::class,
            sectionSeeder::class,
            teacherSeeder::class,
            parentsSeeder::class,
            studentsSeeder::class
        ]);


	}
}
