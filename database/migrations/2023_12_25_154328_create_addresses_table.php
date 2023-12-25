<?php

use App\Models\Tools\City;
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
        Schema::create('addresses', function (Blueprint $table) {

            $table->id();
            $table->uuid()->nullable()->unique();

            $table->morphs('addressable');

            $table->foreignIdFor(City::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->longText('address')->nullable();

            $table->string('country', 100)->nullable();
            $table->string('postal', 70)->nullable();
            $table->enum('type', ['invoice', 'supplier'])->nullable();

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
        Schema::dropIfExists('addresses');
    }
};
