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
        Schema::create('emailreports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('emuser_id')->nullable();
            $table->string('emuser_national')->nullable();
            $table->string('emstatus')->nullable();
            $table->string('emdate')->nullable();
            $table->string('empayment_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emailreports');
    }
};
