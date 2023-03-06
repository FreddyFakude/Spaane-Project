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
        Schema::create('employee_bulk_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('employees')->cascadeOnUpdate();
            $table->foreignId('bulk_message_id')->references('id')->on('bulk_messages')->cascadeOnUpdate();
            $table->string('status');
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
        Schema::dropIfExists('employee_bulk_messages');
    }
};
