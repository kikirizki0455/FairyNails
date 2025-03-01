<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->decimal('total_amount', 10, 2);
            $table->integer('points_earned')->default(0);
            $table->integer('xp_earned')->default(0);
            $table->foreignId('voucher_id')
                  ->nullable()
                  ->constrained('user_vouchers')
                  ->onDelete('set null');
            $table->decimal('discount_amount', 10, 2)->default(0.00);
            $table->enum('payment_status', ['pending','completed','cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};