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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable()->unique();
            $table->string('name', 50);

            $table->string('rc', 70)->unique()->nullable();
            $table->string('ice', 70)->unique()->nullable();
            $table->string('if', 70)->unique()->nullable();
            $table->string('cnss', 70)->unique()->nullable();

            $table->string('website', 100)->unique()->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('telephone', 100)->nullable()->unique();
            $table->string('fax', 100)->nullable()->unique();

            $table->longText('details')->nullable();

            $table->foreignIdFor(Company::class)
                ->index()
                ->nullable()
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
        Schema::dropIfExists('clients');
    }
};
