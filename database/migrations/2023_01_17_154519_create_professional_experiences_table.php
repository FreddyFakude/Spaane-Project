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
        Schema::create('professional_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("professional_experienceable_id");
            $table->string("professional_experienceable_type");
            $table->string("organisation_name");
            $table->string("role");
            $table->boolean("is_current")->default(false);
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
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
        Schema::dropIfExists('professional_experiences');
    }
};
