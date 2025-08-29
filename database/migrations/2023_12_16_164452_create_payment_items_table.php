<?php

use App\Models\Finance\Payment\Payment;
use App\Models\Finance\Sell\Invoice;
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
        Schema::create('payment_items', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable()->unique();

            $table->foreignIdFor(Payment::class)
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(Invoice::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->decimal('price_payed', 13, 2)->default(0);
            $table->decimal('price_rest', 13, 2)->default(0);
            $table->decimal('total_invoice', 13, 2)->default(0);
            $table->decimal('price_tax', 13, 2)->default(0);

            $table->date('document_date')->nullable();
            $table->date('value_date')->nullable();
            $table->date('operation_date')->nullable();

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
        Schema::dropIfExists('payment_items');
    }
};
