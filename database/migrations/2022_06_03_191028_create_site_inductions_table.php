<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteInductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_inductions', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('site_id')->unsigned();
            $table->string('status');
            $table->bigInteger('completed_by')->unsigned();;
            $table->text('notes');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('site_id')->references('id')->on('sites')
                ->onDelete('cascade');
            $table->foreign('completed_by')->references('id')->on('users')
                ->onDelete('cascade');

            $table->primary(['site_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_inductions');
    }
}
