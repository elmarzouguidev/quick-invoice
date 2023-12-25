<?php

use App\Models\CRM\Client;
use App\Models\Tools\Finance\PaymentMethod;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable()->unique();

            $table->foreignIdFor(PaymentMethod::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->foreignIdFor(User::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignIdFor(Client::class)
                ->index()
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('document_number')->unique()->nullable();
            $table->string('payment_reference', 255)->nullable();
            $table->date('document_date')->nullable();
            $table->date('value_date')->nullable();
            $table->date('operation_date')->nullable();
            $table->mediumText('notes')->nullable();

            $table->boolean('is_payed')->default(true);

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
        Schema::dropIfExists('payments');
    }
};
