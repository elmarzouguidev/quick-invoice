<?php

use App\Models\Company\Company;
use App\Models\Tools\City;
use App\Models\Tools\CRM\Activity;
use App\Models\Tools\CRM\Country;
use App\Models\Tools\CRM\Type;
use App\Models\Tools\Finance\Currency;
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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable()->unique();
            $table->string('name', 50);

            $table->string('rc', 50)->nullable();
            $table->string('ice', 50)->nullable();
            $table->string('if', 50)->nullable();
            $table->string('cnss', 50)->nullable();

            $table->string('website', 100)->nullable();
            $table->string('email')->nullable();
            $table->string('telephone', 30)->nullable();
            $table->string('fax', 30)->nullable();

            $table->longText('details')->nullable();
            $table->string('state')->nullable();
            
            $table->foreignIdFor(Company::class)
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(Currency::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignIdFor(Tax::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignIdFor(Activity::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignIdFor(Type::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignIdFor(Country::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->foreignIdFor(City::class)
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
        Schema::dropIfExists('suppliers');
    }
};
