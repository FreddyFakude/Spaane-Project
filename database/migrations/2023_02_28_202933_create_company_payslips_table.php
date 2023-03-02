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
        Schema::create('company_payslips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('employee_id')->constrained('employees');
            $table->string('reference_number')->unique();
            $table->string('hash')->unique()->index();
            $table->string('file_name');
            $table->string('file_path')->nullable();
            $table->double('commission');
            $table->double('basic_salary');
            $table->double('reimbursement');
            $table->double('travel_allowance');
            $table->double('other')->default(0);
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
        Schema::dropIfExists('company_payslips');
    }
};
