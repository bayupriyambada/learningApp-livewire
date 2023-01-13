<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_grade_levels', function (Blueprint $table) {
            // $table->id();
            $table->integer('teacher_id')->unsigned()->index();
            $table->foreign('teacher_id')->references('id')->on('teacher')->onDelete('cascade');

            $table->integer('grade_levels_id')->unsigned()->index();
            $table->foreign('grade_levels_id')->references('id')->on('grade_levels')->onDelete('cascade');
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
        Schema::dropIfExists('teacher_grade_levels');
    }
};
