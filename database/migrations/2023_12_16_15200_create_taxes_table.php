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
            
            $table->string('name', 20)->default('TVA MAROC');
            $table->string('symbole', 20)->default('TVA');
            
            $table->unsignedDecimal('taux')->unique()->default(20.0)->nullable();

            $table->foreignIdFor(Country::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

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
