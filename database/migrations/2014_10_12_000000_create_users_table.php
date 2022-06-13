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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role')->nullable()->default(null);
            $table->string('mobile');
            $table->string('sub_contractor');
            $table->string('vehicle_make')->nullable();
            $table->string('vehicle_reg')->nullable();
            $table->string('cscs_number')->nullable();
            $table->string('password');
            $table->timestamp('induction_completed')->nullable()->default(null);
            $table->timestamp('induction_expires')->nullable()->default(null);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
