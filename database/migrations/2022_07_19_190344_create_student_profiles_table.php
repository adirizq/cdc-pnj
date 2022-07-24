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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('cv')->nullable();
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->integer('student_number')->nullable();
            $table->string('major')->nullable();
            $table->string('languages')->nullable();
            $table->string('skills')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->text('about')->nullable();
            $table->text('experience')->nullable();
            $table->text('education')->nullable();
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
        Schema::dropIfExists('student_profiles');
    }
};
