<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_account_administrators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->references('id')->on('businesses')->cascadeOnUpdate();
            $table->foreignId('role_id')->references('id')->on('business_account_administrator_roles')->cascadeOnUpdate();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->date("dob")->nullable();
            $table->string("gender")->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_image')->default('assets/custom/media/avatars/avatar15.jpg');
            $table->string('phone_number')->nullable();
            $table->string('landline_number')->nullable();
            $table->string('current_position')->nullable();
            $table->date('position_start_date')->nullable();
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
        Schema::dropIfExists('business_account_administrators');
    }
};
