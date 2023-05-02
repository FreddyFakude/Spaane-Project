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
            $table->string('status')->default(\App\Models\Company::STATUS[1]);
            $table->date('date_creation')->nullable();
            $table->string('company_size')->default('SMALL');
            $table->date('fiscal_year_start');
            $table->string('technical_gear')->nullable();
            $table->string('industry')->nullable();
            $table->string('target_market')->nullable();
            $table->string('suppliers')->nullable();
            $table->string('website')->nullable();
            $table->string('funding')->nullable();
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
