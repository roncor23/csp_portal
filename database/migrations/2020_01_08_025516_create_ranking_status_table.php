<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankingStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranking_status', function (Blueprint $table) {
            $table->increments('ranking_status_id');
            $table->string('ranking')->nullable();
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
        Schema::dropIfExists('ranking_status');
    }
}
