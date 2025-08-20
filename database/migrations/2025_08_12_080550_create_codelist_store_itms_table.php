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
        Schema::create('codelist_store_itms', function (Blueprint $table) {

            $table->id();
             $table->string('serial_numcla',100)->nullable();
            $table->string('ar_titlecla',100)->nullable();
            $table->string('En_titlecla',100)->nullable();
            $table->string('descriptioncla',200)->nullable();

            $table->string('created_bycla',100)->nullable();
            $table->string('edit_bycla',100)->nullable();
             $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codelist_store_itms');
    }
};
