<?php

use App\Models\Blood_type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("Blood_types")->truncate();

        $BTS = ["A-" , "B-" , "A+" , "B+" , "AB+" , "AB-" , "O+" , "O-" , ];

        foreach($BTS as $BT){
            Blood_type::create([
                "name"=>$BT
            ]);
        }
    }
}
