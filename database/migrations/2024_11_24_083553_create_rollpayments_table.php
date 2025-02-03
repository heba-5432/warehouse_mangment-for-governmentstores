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
        Schema::create('rollpayments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('serial_number')->nullable();
            $table->string('pay_title');
            $table->string('pay_date')->nullable();
            $table->string('payment_value')->nullable();
            $table->string('user_id')->nullable();
            $table->string('discnt_role_id')->nullable();
            $table->string('financ_id')->nullable();
            $table->string('total_after_dis')->nullable();
            $table->string('total_after_reword')->nullable();
            $table->string('total_after_add_dis')->nullable();
            $table->string('created_by',100)->nullable();
            $table->string('edit_by',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rollpayments');
    }
};
