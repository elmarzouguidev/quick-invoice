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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable()->unique();

            $table->morphs('documentable');
            $table->string('code', 100)->nullable();

            $table->date('document_date')->nullable();
            $table->string('name', 200);
            $table->longText('content')->nullable();
            $table->json('data')->nullable();

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
        Schema::dropIfExists('documents');
    }
};
