<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('applicant_id');
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('xname')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('type_of_disability')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('present_address')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->integer('civil_status')->nullable();
            $table->integer('brgy')->nullable();
            $table->integer('town_city')->nullable();
            $table->integer('cong_dist')->nullable();
            $table->integer('course')->nullable();
            $table->integer('yr_lvl')->nullable();
            $table->double('rank_points', 8,2)->nullable();
            $table->double('gwa', 8, 2)->nullable();
            $table->integer('gender')->nullable();
            $table->double('parent_income', 8, 2)->nullable();
            $table->integer('applicant_type')->nullable();
            $table->integer('supported_by_solo_parent')->default(2);
            $table->integer('hei')->nullable();
            $table->text('hei_remarks')->nullable();
            $table->text('admin_remarks')->nullable();
            $table->text('ranking_remarks')->nullable();
            $table->string('name_of_school_last_attended')->nullable();
            $table->integer('ranking_status')->default(1);
            $table->integer('citizenship')->nullable();
            $table->integer('province')->nullable();
            $table->integer('school_sector')->nullable();
            $table->integer('ay')->nullable();
            $table->integer('ips')->default(2);
            $table->integer('pwd')->default(2);
            $table->integer('forps')->default(2);
            $table->integer('applicant_solo_parent')->default(2);
            $table->integer('senior_citizen')->default(2);
            $table->integer('verified_hei')->default(3);
            $table->integer('verified_admin')->nullable();
            $table->string('reference_no')->nullable();
            $table->string('validatedByCHED')->nullable();  
            $table->string('validatedByHEI')->nullable();         
            $table->timestamps();
            $table->integer('status')->default(1);
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('status')->references('applicant_status_id')->on('applicant_status')->onDelete('cascade');
            $table->foreign('civil_status')->references('civil_status_id')->on('libcivilstatus')->onDelete('cascade');
            $table->foreign('senior_citizen')->references('senior_citizen_id')->on('senior_citizens')->onDelete('cascade');
            $table->foreign('town_city')->references('city_id')->on('mun_citys')->onDelete('cascade');
            $table->foreign('course')->references('course_id')->on('courses')->onDelete('cascade');
            $table->foreign('cong_dist')->references('district_id')->on('districts')->onDelete('cascade');
            $table->foreign('applicant_solo_parent')->references('applicant_solo_parent_id')->on('applicant_solo_parents')->onDelete('cascade');
            $table->foreign('hei')->references('hei_id')->on('heis')->onDelete('cascade');
            $table->foreign('applicant_type')->references('applicant_type_id')->on('libapplicanttypes')->onDelete('cascade');
            $table->foreign('citizenship')->references('citizenship_id')->on('libcitizenships')->onDelete('cascade');
            $table->foreign('gender')->references('gender_id')->on('genders')->onDelete('cascade');
            $table->foreign('province')->references('province_id')->on('provinces')->onDelete('cascade');
            $table->foreign('brgy')->references('brgy_id')->on('brgys')->onDelete('cascade');
            $table->foreign('ranking_status')->references('ranking_status_id')->on('ranking_status')->onDelete('cascade');
            $table->foreign('verified_hei')->references('verified_hei_id')->on('verified_heis')->onDelete('cascade');
            $table->foreign('verified_admin')->references('verified_admin_id')->on('verified_admins')->onDelete('cascade');
            $table->foreign('supported_by_solo_parent')->references('solo_parent_id')->on('solo_parents')->onDelete('cascade');
            $table->foreign('school_sector')->references('school_sector_id')->on('school_sectors')->onDelete('cascade');
            $table->foreign('ips')->references('ips_id')->on('ips')->onDelete('cascade');
            $table->foreign('pwd')->references('pwd_id')->on('pwds')->onDelete('cascade');
            $table->foreign('forps')->references('4ps_id')->on('4ps')->onDelete('cascade');
            $table->foreign('ay')->references('libsy_id')->on('libsys')->onDelete('cascade');
            $table->foreign('yr_lvl')->references('yr_lvl_id')->on('yr_lvls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
