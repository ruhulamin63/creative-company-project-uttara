<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name', 255)->nullable();
            $table->string('position', 255)->nullable();
            $table->text('image',150)->nullable();
            $table->string('desc', 255)->nullable();

            $table->string('linkin_id', 255)->nullable();
            $table->string('facebook_id', 255)->nullable();
            $table->string('twitter_id', 255)->nullable();
            $table->string('github_id', 255)->nullable();
            
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
        Schema::dropIfExists('teams');
    }
}
