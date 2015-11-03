<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',100);
            $table->text('profile_image');
            $table->string('company_name',500);
            $table->string('designation',500);
            $table->bigInteger('mobile_no');
            $table->bigInteger('phone_no');
            $table->string('gender',25);
            $table->text('address');
            $table->integer('pincode');
            $table->date('dob');
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
        Schema::drop('profiles');
    }
}
