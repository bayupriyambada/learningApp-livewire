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
        Schema::create('teacher', function (Blueprint $table) {
            $table->id()->index();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('education_degree')->nullable();
            $table->string('nik')->nullable();
            $table->string('biography')->nullable();
            $table->string('address')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('date_of_place')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('images')->nullable();
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('teacher_models');
    }
};
