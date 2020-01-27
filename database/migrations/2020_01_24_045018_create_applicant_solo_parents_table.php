<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantSoloParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_solo_parents', function (Blueprint $table) {
            $table->increments('applicant_solo_parent_id');
            $table->string('solo')->nullable();
            $table->integer('created_by');
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
        Schema::dropIfExists('applicant_solo_parents');
    }
}
