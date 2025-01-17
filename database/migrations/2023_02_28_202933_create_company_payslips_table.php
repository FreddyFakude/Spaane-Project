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
            $table->date('date');
            $table->string('month_year')->format('Y-m');
            $table->json('earnings');
            $table->json('deductions')->nullable();
            $table->json('other_earnings')->nullable();
            $table->json('contributions')->nullable();
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
