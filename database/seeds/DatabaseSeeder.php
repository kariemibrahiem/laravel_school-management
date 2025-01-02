<?php

use App\Models\ClassRoom;
use App\Models\Grade;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();


		$this->call([
			BloodSeeder::class,
			NationalitiesSeeder::class,
			ReligionSeeder::class
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