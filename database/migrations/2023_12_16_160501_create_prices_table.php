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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable()->unique();

            $table->morphs('priceable');

            $table->decimal('price_ht', 13, 2)->default(0)->nullable();
            $table->decimal('price_total', 13, 2)->default(0)->nullable();
            $table->decimal('price_tax', 13, 2)->default(0)->nullable();
            $table->decimal('price_remise', 13, 2)->default(0)->nullable();
            $table->decimal('price_due', 13, 2)->default(0)->nullable();

            $table->date('price_date')->nullable();
            $table->boolean('is_valid')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
