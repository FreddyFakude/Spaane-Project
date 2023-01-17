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
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("addressable_type");
            $table->bigInteger("addressable_id");
            $table->string("street_name");
            $table->string("street_number");
            $table->string("complex_or_building")->nullable();
            $table->string("city");
            $table->string("suburb")->nullable();
            $table->string("state");
            $table->string("country")->default("South Africa");
            $table->string("zip_code")->nullable();
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
        Schema::dropIfExists('addresses');
    }
};
