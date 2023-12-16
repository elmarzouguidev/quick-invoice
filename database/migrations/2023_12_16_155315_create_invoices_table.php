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

            $table->foreignIdFor(Currency::class)->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Client::class)->index()->nullable()->constrained()->nullOnDelete();

            $table->string('document_number')->unique()->nullable();

            $table->unsignedInteger('status')->default(DocumentStatuses::DRAFT->value);

            $table->string('bl_code', 200)->nullable();
            $table->string('bc_code', 200)->nullable();

            $table->decimal('price_ht', 13, 2)->default(0)->nullable();
            $table->decimal('price_total', 13, 2)->default(0)->nullable();
            $table->decimal('price_tax', 13, 2)->default(0)->nullable();
            $table->decimal('price_remise', 13, 2)->default(0)->nullable();
            $table->decimal('price_due', 13, 2)->default(0)->nullable();

            $table->date('document_date')->nullable();
            $table->date('due_date')->nullable();
            $table->date('payment_date')->nullable();

            $table->boolean('has_avoir')->default(false);
            $table->boolean('is_send')->default(false);
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_valid')->default(false);
            $table->boolean('is_active')->default(true);

            $table->mediumText('admin_notes')->nullable();
            $table->mediumText('condition_general')->nullable();
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
