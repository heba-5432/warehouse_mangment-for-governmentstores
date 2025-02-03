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
        Schema::create('usersmoredetails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('national_p_id')->nullable()->default(0);
            $table->string('profil_impath')->nullable();
            $table->string('files_name')->nullable();

            $table->string('files_path')->nullable();
            $table->string('descrption',5000)->nullable();
            $table->string('user_idf')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usersmoredetails');
    }
};
