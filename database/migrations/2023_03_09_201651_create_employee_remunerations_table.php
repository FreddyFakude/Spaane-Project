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
        Schema::create('employee_remunerations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('employees')->cascadeOnUpdate();
            $table->double('basic_salary', 8, 2)->nullable();
            $table->double('travel_allowance', 8, 2)->nullable();
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
        Schema::dropIfExists('employee_remunerations');
    }
};
