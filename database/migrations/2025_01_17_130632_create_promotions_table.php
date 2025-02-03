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

            $table->integer("from_year")->default(2025);
            $table->integer("to_year")->default(2025);

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
