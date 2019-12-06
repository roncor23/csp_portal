<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersActionList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_list_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('in_out');
            $table->string('csp_kto12');
            $table->string('subject');
            $table->string('concern');
            $table->string('from');
            $table->string('action_required');
            $table->string('support_needed');
            $table->string('responsible_person');
            $table->string('status');
            $table->string('remarks');
            $table->string('addedBy');
            $table->string('updatedBy')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('action_list_models');
    }
}
