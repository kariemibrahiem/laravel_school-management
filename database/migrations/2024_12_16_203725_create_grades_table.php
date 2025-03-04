<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration {

	public function up()
	{
		Schema::create('grades', function(Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->text('notes')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('grades');
	}
}