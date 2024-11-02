<?php

use App\Models\Tools\CRM\Country;
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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable()->unique();

            $table->foreignIdFor(Country::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('name', 30);
            $table->string('symbole', 30)->nullable();

            $table->float('taux')->default(00.0)->nullable();

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
        Schema::dropIfExists('taxes');
    }
};
