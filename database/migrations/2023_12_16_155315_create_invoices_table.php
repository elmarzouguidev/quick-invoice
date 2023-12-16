<?php

use App\Enums\Document\DocumentStatuses;
use App\Models\CRM\Client;
use App\Models\Tools\Finance\Currency;
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
        Schema::create('invoices', function (Blueprint $table) {

            $table->id();
            $table->uuid()->nullable()->unique();

            $table->foreignIdFor(Currency::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Client::class)->index()->nullable()->constrained()->nullOnDelete();

            $table->string('document_number')->unique()->nullable();

            $table->unsignedInteger('status')->default(DocumentStatuses::DRAFT->value);

            $table->date('document_date')->nullable();
            $table->date('due_date')->nullable();
            $table->date('payment_date')->nullable();

            $table->boolean('is_send')->default(false);
            $table->boolean('is_valid')->default(false);
            $table->boolean('is_active')->default(true);

            $table->mediumText('notes')->nullable();
            $table->mediumText('conditions')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
