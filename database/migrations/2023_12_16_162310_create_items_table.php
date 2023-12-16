<?php

use App\Models\Tools\Finance\Tax;
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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable()->unique();

            $table->morphs('itemable');

            $table->foreignIdFor(Tax::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->unsignedBigInteger('position')->default(0);

            $table->longText('designation')->nullable();
            $table->longText('description')->nullable();
            $table->json('options')->nullable();

            $table->float('quantity')->default(0)->nullable();

            $table->decimal('price_unit', 13, 2)->default(0);
            $table->decimal('price_ht', 13, 2)->default(0);
            $table->decimal('price_remise', 13, 2)->default(0);
            $table->decimal('price_tax', 13, 2)->default(0);
            $table->decimal('price_ttc', 13, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
