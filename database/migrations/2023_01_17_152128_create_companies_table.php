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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number');
            $table->date('date_creation')->nullable();
            $table->date('fiscal_year_start');
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
        Schema::dropIfExists('companies');
    }
};
