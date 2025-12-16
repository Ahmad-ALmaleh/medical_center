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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            // العلاقة مع الموعد
            $table->foreignId('appointment_id')->constrained()->cascadeOnDelete();

            // من أصدر الفاتورة
            $table->foreignId('issued_by')->constrained('employees')->cascadeOnDelete();

            // بيانات الفاتورة
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'paid', 'cancelled', 'refunded'])->default('pending');
            $table->enum('payment_method', ['cash', 'card', 'online']);
            $table->timestamp('paid_at')->nullable();

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
