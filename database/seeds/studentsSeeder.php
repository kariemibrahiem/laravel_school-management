<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class studentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        \App\Models\Student::truncate();
        $faker = Faker::create();

        $bloodTypes = DB::table('blood_types')->pluck('id')->toArray();
        $Grade_id = \App\Models\Grade::first();
        $Classroom_id = \App\Models\ClassRoom::first();
        $section_id = \App\Models\Sections::first();
        $nationalities = DB::table('nationalities')->pluck('id')->toArray();
        $parents = DB::table('myparents')->pluck('id')->toArray();

        DB::table('students')->insert([
            'name' => 'Omar Mohamed',
            'email' => 'student@example.com',
            'password' => bcrypt('student123'), // تشفير كلمة المرور
            'Date_Birth' => $faker->date(),
            'gender' => $faker->randomElement(['male', 'female']),
            'blood_id' => $faker->randomElement($bloodTypes),
            'Grade_id' => $Grade_id->id,
            'Classroom_id' => $Classroom_id->id,
            'section_id' => $section_id->id,
            'academic_year' => 2025,
            'nationalitie_id' => $faker->randomElement($nationalities),
            'parent_id' => $faker->randomElement($parents), // ربط الطالب بأحد الآباء
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
