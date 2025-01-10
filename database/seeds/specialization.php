<?php

use App\Models\Specialization as ModelsSpecialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class specialization extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ModelsSpecialization::truncate();
        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'Sciences', 'ar'=> 'علوم'],
            ['en'=> 'Computer', 'ar'=> 'حاسب الي'],
            ['en'=> 'English', 'ar'=> 'انجليزي'],
        ];
        foreach ($specializations as $S) {
            ModelsSpecialization::create(['Name' => $S]);
        }
    }
}
