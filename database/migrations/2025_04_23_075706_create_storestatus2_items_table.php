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
        Schema::create('storestatus2_items', function (Blueprint $table) {
            $table->id();
            $table->string('ar_titles2',100)->nullable();
            $table->string('En_titles2',100)->nullable();
            $table->string('descriptions2',200)->nullable();
            $table->timestamps();
            $table->string('created_by',100)->nullable();
            $table->string('edit_by',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storestatus2_items');
    }
};
