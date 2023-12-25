<?php

use App\Enums\Company\CompanyType;
use App\Models\User;
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
        Schema::create('companies', function (Blueprint $table) {

            $table->id();
            $table->uuid()->nullable()->unique();

            $table->foreignIdFor(User::class)->index()->nullable()->constrained();
            $table->uuid('user_uuid')->nullable();

            $table->enum('type', array_column(CompanyType::cases(), 'value'));

            $table->string('code', 15)->unique()->nullable();
            $table->string('name', 200);

            $table->string('rc', 70)->unique()->nullable();
            $table->string('ice', 70)->unique()->nullable();
            $table->string('if', 70)->unique()->nullable();
            $table->string('cnss', 70)->unique()->nullable();
            $table->string('patent', 70)->unique()->nullable();

            $table->string('website', 100)->unique()->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('telephone', 100)->nullable()->unique();
            $table->string('fix', 100)->nullable()->unique();
            $table->string('fax', 100)->nullable()->unique();

            $table->longText('details')->nullable();

            $table->boolean('is_active')->default(true);
            $table->boolean('is_valid')->default(true);
            $table->boolean('is_default')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
