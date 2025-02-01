<?php

use Illuminate\Database\Seeder;
use App\User;
class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();


        User::create([
            "name" => "admin",
            "email"=> "admin@g.c",
            "password"=> 123456789,
        ]);
    }
}
