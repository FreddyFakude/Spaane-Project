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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string("messageable_type");
            $table->bigInteger("messageable_id");
            $table->foreignId("chat_id")->references('id')->on('chats')->cascadeOnUpdate();
            $table->text("message");
            $table->boolean("is_read")->default(false);
            $table->string("file_path")->nullable();
            $table->string("file_type")->nullable();
            $table->boolean("is_outbound")->default(true);
            $table->string("status")->default('sent');
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
        Schema::dropIfExists('messages');
    }
};
