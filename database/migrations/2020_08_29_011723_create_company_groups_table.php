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
        Schema::create('company_groups', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable();

            $table->string('code', 15)->unique()->nullable();
            $table->string('name', 200);
            $table->mediumText('description')->nullable();

            $table->boolean('is_active')->default(true);
            $table->boolean('is_valid')->default(true);
            $table->boolean('is_default')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_groups');
    }
};
