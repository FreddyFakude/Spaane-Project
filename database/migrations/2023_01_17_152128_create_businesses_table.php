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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number');
            $table->foreignId('eco_system_id')->nullable()->references('id')->on('eco_systems')->cascadeOnUpdate();
            $table->date('date_creation')->nullable();
            $table->string('technical_gear')->nullable();
            $table->string('target_market')->nullable();
            $table->string('suppliers')->nullable();
            $table->string('website')->nullable();
            $table->string('funding');
            $table->mediumText('short_description');
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
        Schema::dropIfExists('businesses');
    }
};
