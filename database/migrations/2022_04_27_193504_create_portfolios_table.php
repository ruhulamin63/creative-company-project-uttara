<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');

            // $table->string('company_name', 255)->nullable();
            // $table->string('reg_no', 255)->nullable();
            // $table->string('trade_licence_no', 255)->nullable();
            // $table->text('image_logo',150)->nullable();
            // $table->string('tagline', 255)->nullable();
            // $table->string('website',150)->nullable();
            // $table->string('facebook_link',255)->nullable();
            // $table->string('skype_id',255)->nullable();
            // $table->string('bank_account_name',255)->nullable();
            // $table->string('bank_name',255)->nullable();
            // $table->string('branch_name',255)->nullable();
            
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
        Schema::dropIfExists('portfolios');
    }
}
