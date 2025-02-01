<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class parentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        \App\Models\Myparent::truncate();
        $faker = Faker::create();

        $bloodTypes = DB::table('blood_types')->pluck('id')->toArray();
        $nationalities = DB::table('nationalities')->pluck('id')->toArray();
        $religions = DB::table('religions')->pluck('id')->toArray();


        \App\Models\Myparent::create([
            'F_name' => 'Mohamed Ahmed',
            'F_email' => 'father@example.com',
            'F_password' => Hash::make('password123'), // كلمة مرور مشفرة
            'F_job' => 'Engineer',
            'F_phone' => 123456789,
            'F_address' => '123 Cairo Street, Egypt',
            'National_ID_Father' => '123456789012',
            'F_blood_id' => $faker->randomElement($bloodTypes),
            'F_nationality_id' => $faker->randomElement($nationalities),
            'F_religion_id' => $faker->randomElement($religions),

            'M_name' => 'Amina Ali',
            'M_job' => 'Doctor',
            'M_phone' => 987654321,
            'M_address' => '456 Giza Street, Egypt',
            'M_blood_id' => $faker->randomElement($bloodTypes),
            'M_nationality_id' => $faker->randomElement($nationalities),
            'M_religion_id' => $faker->randomElement($religions),

            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
