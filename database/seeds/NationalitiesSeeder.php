<?php

use App\Models\Nationalities;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table("nationalities")->truncate();

        $nathonal = [
            "egyption",
            "england",
            "britsh",
        ];
        foreach($nathonal as $nat){
            Nationalities::create([
                "name"=>$nat,
            ]);
        }
    }
}
