<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyparentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myparents', function (Blueprint $table) {
            $table->id();
            $table->string("F_name");
            $table->string("F_email");
            $table->string("F_password");
            $table->string("F_job")->nullable();
            $table->integer("F_phone")->nullable();
            $table->string("F_address")->nullable();
            $table->string("National_ID_Father");
            $table->unsignedBigInteger("F_blood_id");
            $table->unsignedBigInteger("F_nationality_id");
            $table->unsignedBigInteger("F_religion_id");
            $table->foreign("F_blood_id")->references("id")->on("blood_types")->cascadeOnDelete();
            $table->foreign("F_nationality_id")->references("id")->on("nationalities")->cascadeOnDelete();
            $table->foreign("F_religion_id")->references("id")->on("religions")->cascadeOnDelete();
        //    mother migrations database
            $table->string("M_name");
            $table->string("M_job")->nullable();
            $table->integer("M_phone")->nullable();
            $table->string("M_address")->nullable();
            $table->unsignedBigInteger("M_blood_id");
            $table->unsignedBigInteger("M_nationality_id");
            $table->unsignedBigInteger("M_religion_id");
            $table->foreign("M_blood_id")->references("id")->on("blood_types")->cascadeOnDelete();
            $table->foreign("M_nationality_id")->references("id")->on("nationalities")->cascadeOnDelete();
            $table->foreign("M_religion_id")->references("id")->on("religions")->cascadeOnDelete();
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
        Schema::dropIfExists('myparents');
    }
}
