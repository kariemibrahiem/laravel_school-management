<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")->constrained("students")->cascadeOnDelete();

            $table->foreignId("from_class_room")->constrained("class_rooms")->cascadeOnDelete();
            $table->foreignId("from_grade")->constrained("grades")->cascadeOnDelete();
            $table->foreignId("from_section")->constrained("sections")->cascadeOnDelete();

            $table->foreignId("to_class_room")->constrained("class_rooms")->cascadeOnDelete();
            $table->foreignId("to_grade")->constrained("grades")->cascadeOnDelete();
            $table->foreignId("to_section")->constrained("sections")->cascadeOnDelete();

            $table->string("from_year");
            $table->string("to_year");

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
        Schema::dropIfExists('promotions');
    }
}
