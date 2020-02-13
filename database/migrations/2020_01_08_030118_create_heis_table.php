<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heis', function (Blueprint $table) {
            $table->increments('hei_id');
            $table->string('hei_code')->nullable();
            $table->string('hei_name')->nullable();
            $table->string('hei_abb')->nullable();
            $table->string('brgy_street')->nullable();
            $table->string('town_city')->nullable();
            $table->string('province')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('fax_no')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('est_year')->nullable();
            $table->string('head_name')->nullable();
            $table->string('head_tel')->nullable();
            $table->integer('head_gender')->nullable();
            $table->string('head_desig')->nullable();
            $table->string('former_name')->nullable();
            $table->string('bank_acct_name')->nullable();
            $table->string('bank_accnt_no')->nullable();
            $table->integer('hei_type')->nullable();
            $table->integer('hei_class')->nullable();
            $table->integer('region')->nullable();
            $table->integer('district')->nullable();  
            $table->foreign('district')->references('district_id')->on('districts')->onDelete('cascade');
            $table->foreign('head_gender')->references('gender_id')->on('genders')->onDelete('cascade');
            $table->foreign('hei_type')->references('hei_type_id')->on('hei_types')->onDelete('cascade');
            $table->foreign('hei_class')->references('hei_class_id')->on('hei_class')->onDelete('cascade');
            $table->foreign('region')->references('region_id')->on('regions')->onDelete('cascade');
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
        Schema::dropIfExists('heis');
    }
}
