<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('position_name', 255)->nullable();
            $table->integer('vacancy')->nullable();
            $table->string('job_type',150)->nullable();
            $table->date('apply_date')->nullable();
            $table->string('job_context', 10000)->nullable();
            $table->string('job_nature', 255)->nullable();
            $table->string('edu_requiment', 255)->nullable();
            $table->string('job_location', 255)->nullable();
            $table->string('salary_range', 255)->nullable();
            $table->string('other_benefit', 255)->nullable();
            
            $table->integer('activeStatus')->nullable()->default(1)->comment = '1. Active 0. Denied';
            
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
        Schema::dropIfExists('careers');
    }
}
