<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('course_id');
            $table->string('course_code')->nullable();
            $table->string('course_name')->nullable();
            $table->string('course_abb')->nullable();
            $table->integer('course_field')->nullable();
            $table->string('program_level_code')->nullable();
            $table->string('program_major')->nullable();
            $table->string('program_level')->nullable();
            $table->string('6_digit_psced_code')->nullable();
            $table->string('psced_program_name')->nullable();
            $table->string('2_digit_disc_code')->nullable();
            $table->string('discipline_cluster_name')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();         
            $table->integer('created_at');
            $table->integer('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
