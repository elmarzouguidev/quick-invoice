<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable()->unique();

            $table->string('name', 20);
            $table->string('code', 20)->nullable();
            $table->string('symbol', 5)->nullable();
            $table->integer('precision')->nullable();
            $table->string('thousand_separator', 10)->nullable();
            $table->string('decimal_separator', 10)->nullable();
            $table->boolean('swap_currency_symbol')->default(false);

            $table->boolean('is_active')->default(true);
            $table->boolean('is_valid')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
