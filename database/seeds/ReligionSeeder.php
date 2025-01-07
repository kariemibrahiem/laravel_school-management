<?php

use App\Models\Religion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table("Religions")->truncate();

        $religion = [
            "misilim",
        ];
        foreach($religion as $rel){
            Religion::create([
                "name"=>$rel,
            ]);
        }
    }
}
