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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('companies')->cascadeOnUpdate();
            $table->foreignId('company_account_administrator_id')->references('id')->on('company_account_administrators')->cascadeOnUpdate();
            $table->bigInteger('chatable_id');
            $table->string('chatable_type');
            $table->string('status')->default(\App\Models\Chat::STATUS['opened']);
            $table->string("hash")->index();
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
        Schema::dropIfExists('company_employee_chats');
    }
};
