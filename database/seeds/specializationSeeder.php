<?php

use Illuminate\Database\Seeder;

class specializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations = [
            'Arabic',
            'Sciences',
            'Computer',
            'English'
        ];
        foreach ($specializations as $S) {
            \App\Models\Specialization::create(['Name' => $S]);
        }
    }
}
