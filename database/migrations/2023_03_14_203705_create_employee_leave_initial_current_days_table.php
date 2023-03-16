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
        Schema::create('employee_leave_initial_current_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('employees')->cascadeOnUpdate();
            $table->foreignId('leave_policy_id')->references('id')->on('employee_leave_policies')->cascadeOnUpdate();
            $table->foreignId('company_id')->references('id')->on('companies')->cascadeOnUpdate();
            $table->foreignId('leave_type_id')->references('id')->on('leave_types')->cascadeOnUpdate();
            $table->double('days', '6', '2');
            $table->date('expiry_date');
            $table->string('leave_type_name');
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
        Schema::dropIfExists('employee_leave_days');
    }
};
