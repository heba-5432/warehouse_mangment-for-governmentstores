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
        Schema::create('timeschedules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('time_title');
            $table->string('time_day')->nullable();
            $table->string('time_month')->nullable();
            $table->string('time_year')->nullable();
            $table->string('start_date_t')->nullable();
            $table->string('end_date_t')->nullable();
            $table->string('created_by',100)->nullable();
            $table->string('edit_by',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timeschedules');
    }
};
