<?php

use App\Models\ClassRoom;
use App\Models\Grade;
use App\Models\Specialization;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		// Model::unguard();

		// DB::table("users")->delete();
		// User::truncate();

		$this->call([
			BloodSeeder::class,
			NationalitiesSeeder::class,
			ReligionSeeder::class,
			// Specialization::class
		]);



		User::create([
			"name" => "admin",
			"email"=> "admin@g.c",
			"password"=> 123456789,
		]);

		Grade::create([
			"name" => "main grade",
			"notes" => "desc of main grade"
		]);
		$grade = Grade::latest()->first();
		ClassRoom::create([
			"className" => "main grade",
			"grade_id" => $grade->id
		]);


	
	}
}