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
        Schema::create('store_poor_storge_items', function (Blueprint $table) {
            $table->id();

            $table->string('item_store_idp',6);
            $table->string('number_returnp',6);
           $table->string('returned_datep',100)->nullable();
            $table->string('noticeisp',250)->nullable();
            $table->string('created_by',100)->nullable();
            $table->string('edit_by',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_poor_storge_items');
    }
};
