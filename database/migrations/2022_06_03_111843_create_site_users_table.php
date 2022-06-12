<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('site_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('status')->default('on site');
            $table->bigInteger('signed_in_by')->unsigned();
            $table->bigInteger('signed_out_by')->unsigned();
            $table->timestamp('time_on_site')->nullable();
            $table->timestamp('time_off_site')->nullable();
            $table->timestamps();
            
            $table->foreign('site_id')
                ->references('id')->on('sites')
                ->onDelete('cascade');
            
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('signed_in_by')
                ->references('id')->on('users')
                ->onDelete('cascade');
                
            $table->foreign('signed_out_by')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_users');
    }
}
