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
        Schema::create('employee_leave_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('employees')->cascadeOnUpdate();
                $table->foreignId('leave_type_initial_day_id')->references('id')->on('employee_leave_type_initial_days')->cascadeOnUpdate();
            $table->foreignId('company_leave_setting_id')->references('id')->on('company_leave_settings')->cascadeOnUpdate();
            $table->string('leave_type');
            $table->integer('total_days');
            $table->string('hash');
            $table->string('status')->default(\App\Models\EmployeeLeaveRequest::STATUS['review']);
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
        Schema::dropIfExists('employee_leaves');
    }
};
