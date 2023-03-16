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
        Schema::create('employee_leave_request_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('employees')->cascadeOnUpdate(); // employee_id
            $table->foreignId('company_leave_setting_id')->references('id')->on('company_leave_settings')->cascadeOnUpdate(); // company_leave_setting_id
            $table->foreignId('employee_leave_request_id')->references('id')->on('employee_leave_requests')->cascadeOnUpdate(); // employee_leave_request_id
            $table->foreignId('company_leave_type_id')->references('id')->on('company_leave_types')->cascadeOnUpdate(); // company_leave_type_id
            $table->date('date_requested');
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
        Schema::dropIfExists('employee_leave_request_days');
    }
};
