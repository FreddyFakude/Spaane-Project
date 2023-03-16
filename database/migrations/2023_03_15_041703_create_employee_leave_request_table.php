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
            $table->foreignId('leave_initial_day_id')->references('id')->on('employee_leave_initial_current_days')->cascadeOnUpdate();
//            $table->foreignId('company_leave_policy_id')->references('id')->on('company_leave_policies')->cascadeOnUpdate();
            $table->foreignId('employee_leave_policy_id')->references('id')->on('employee_leave_policies')->cascadeOnUpdate();
            $table->string('leave_type');
            $table->date('start_date');
            $table->date('end_date');
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
