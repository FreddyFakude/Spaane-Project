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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('direct_manager')->nullable();
            $table->string('email')->unique();
            $table->string('hash')->unique();
            $table->foreignId('company_department_id')->references('id')->on('company_departments')->cascadeOnUpdate();
            $table->foreignId('company_id')->references('id')->on('companies')->cascadeOnUpdate();
            $table->string('personal_email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->string('password');
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->integer('talent_visibility')->default(0);
            $table->string('marital_status')->nullable();
            $table->integer('number_of_children')->default(0);
            $table->string('role')->default('Unknown');
            $table->string('mobile_number')->unique();
            $table->string('driving_license_number')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('id_or_passport')->nullable();
            $table->string('nationality')->nullable();
            $table->string('home_phone_number')->nullable();
            $table->string('office_phone_number')->nullable();
            $table->string('emergency_phone_number')->nullable();
            $table->string('special_note', 500)->nullable();
            $table->string('website')->nullable();
            $table->string('status')->default('INVITE SENT');
            $table->boolean('is_profile_complete')->default(false);
            $table->boolean('is_available')->default(TRUE);
            $table->string('type')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
