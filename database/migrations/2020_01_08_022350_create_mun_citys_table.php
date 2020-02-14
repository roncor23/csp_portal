<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunCitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mun_citys', function (Blueprint $table) {
            $table->increments('city_id');
            $table->string('mun_city_name')->nullable();
            $table->integer('province_i')->nullable();
            $table->integer('district')->nullable();
            $table->foreign('province_i')->references('province_id')->on('provinces')->onDelete('cascade');
            $table->foreign('district')->references('district_id')->on('districts')->onDelete('cascade');
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
        Schema::dropIfExists('mun_citys');
    }
}
