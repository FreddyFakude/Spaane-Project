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
        Schema::create('automated_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_id")->references('id')->on('companies')->cascadeOnUpdate();
            $table->text("message");
            $table->string("slug")->index();
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
        Schema::dropIfExists('automated_responses');
    }
};
