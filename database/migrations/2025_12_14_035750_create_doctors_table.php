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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
             // العلاقة مع المستخدم
             $table->foreignId('user_id')->constrained()->cascadeOnDelete();

             // العلاقة مع العيادة
             $table->foreignId('clinic_id')->constrained()->cascadeOnDelete();

             // البيانات الخاصة بالطبيب
             $table->string('specialty');
             $table->string('license_number')->unique();
             $table->enum('status', ['active', 'inactive', 'suspended'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
