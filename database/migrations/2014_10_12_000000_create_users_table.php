<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name',191)->nullable();
            $table->string('father_name',191)->nullable();
            $table->string('mother_name', 191)->nullable();
            $table->string('address', 191)->nullable();
            $table->string('contact_number', 191)->nullable();
            $table->string('password', 191)->nullable();

            $table->text('image', 255)->nullable();
            $table->text('nid_front_side_image', 255)->nullable();
            $table->text('nid_back_side_image', 255)->nullable();

            $table->integer('dob_day')->nullable();
            $table->integer('dob_month')->nullable();
            $table->integer('dob_year')->nullable();
            $table->string('nid', 255)->nullable();

            $table->integer('user_type')->nullable()->comment = '1.admin 2.customer';
            $table->integer('activeStatus')->nullable();
            
            $table->integer('info_verify')->nullable()->comment = '0.in_active 1.active';
            $table->integer('loan_verify')->nullable()->comment = '0.in_active 1.active';
            $table->integer('delivery_loan')->nullable()->comment = '0.in_active 1.active';
            
            $table->timestamp('otp_verified_at')->nullable();
            $table->rememberToken();

            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
