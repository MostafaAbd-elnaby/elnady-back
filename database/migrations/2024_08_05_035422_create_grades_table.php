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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_student_id')->nullable();
            $table->unsignedBigInteger('grade_item_id')->nullable();
            $table->integer('score');

            $table->foreign('course_student_id')->references('id')->on('course_student')->onDelete('cascade');
            $table->foreign('grade_item_id')->references('id')->on('grade_items')->onDelete('cascade');
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
        Schema::dropIfExists('grades');
    }
};
