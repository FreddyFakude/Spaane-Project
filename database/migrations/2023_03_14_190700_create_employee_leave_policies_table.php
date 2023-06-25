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
        Schema::create('employee_leave_policies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('companies')->cascadeOnUpdate();
            $table->foreignId('employee_id')->references('id')->on('employees')->cascadeOnUpdate();
            $table->foreignId("leave_type_id")->references('id')->on('leave_types')->cascadeOnUpdate();
            $table->foreignId('company_leave_policy_id')->references('id')->on('company_leave_policies')->cascadeOnUpdate();
            $table->integer('days');
            $table->string('text')->nullable();
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
        Schema::dropIfExists('employee_leave_policies');
    }
};
