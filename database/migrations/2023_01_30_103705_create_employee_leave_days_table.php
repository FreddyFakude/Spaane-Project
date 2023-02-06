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
        Schema::create('employee_leave_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('employees')->cascadeOnUpdate();
            $table->double('days', '6', '2')->default(10.00);
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
