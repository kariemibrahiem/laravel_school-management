<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_teacher', function (Blueprint $table) {
            $table->id();
            $table->foreignId("sections_id")->constrained("sections")->cascadeOnDelete();
            $table->foreignId("teacher_id")->constrained("teachers")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('section_teacher');
    }
}
