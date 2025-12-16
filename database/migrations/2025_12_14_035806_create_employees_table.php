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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
              // العلاقة مع المستخدم
              $table->foreignId('user_id')->constrained()->cascadeOnDelete();

              // البيانات الخاصة بالموظف
              $table->string('job_title');
              $table->decimal('salary', 10, 2);
              $table->date('hired_at');
              $table->enum('status', ['active', 'inactive'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
