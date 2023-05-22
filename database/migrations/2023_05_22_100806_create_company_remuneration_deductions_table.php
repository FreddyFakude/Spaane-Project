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
        Schema::create('company_remuneration_deductions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('hash')->unique();
            $table->boolean('is_active')->default(false);
            $table->string('type')->default(\App\Models\CompanyRemunerationDeduction::types['fixed']);
            $table->double('amount')->default(0);
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
        Schema::dropIfExists('company_remuneration_deductions');
    }
};
