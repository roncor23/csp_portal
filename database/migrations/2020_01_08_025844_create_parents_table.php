<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->increments('parent_id');
            $table->string('father_fname')->nullable();
            $table->string('father_mname')->nullable();
            $table->string('father_lname')->nullable();
            $table->string('father_xname')->nullable();
            $table->string('mother_fname')->nullable();
            $table->string('mother_mname')->nullable();
            $table->string('mother_lname')->nullable();
            $table->string('mother_xname')->nullable();
            $table->string('mother_contact_number')->nullable();
            $table->string('father_contact_number')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('father_occupation')->nullable();
            $table->integer('number_of_siblings')->default(0);
            $table->string('mother_employer')->nullable();
            $table->string('father_employer')->nullable();
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->nullable();         
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
        Schema::dropIfExists('parents');
    }
}
