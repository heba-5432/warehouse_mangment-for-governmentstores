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
        Schema::create('storeloan_items', function (Blueprint $table) {
            $table->id();
            $table->string('userloan_id',6);
             $table->string('parteners',800)->nullable();
            $table->string('item_store_id',6);
            $table->string('number_itemsi',6)->nullable();
            $table->string('departmentis',100)->nullable();
            $table->string('loan_date',100)->nullable();
           $table->string('returned_date',100)->nullable();
           $table->string('number_returnedis',6)->nullable();
           $table->string('number_currentis',6)->nullable();
            $table->string('status_returned',20)->nullable();
            $table->string('user2_loan_id',6)->nullable();
            $table->string('status_to_user2',5)->nullable();
            $table->string('noticeis',250)->nullable();
            $table->string('item_owner',20)->nullable();
            $table->string('owner_itm_no',10)->nullable();
            $table->string('edit_disabled',2)->nullable();
             $table->string('statusi2',10)->nullable();
              $table->string('used_price_item',20)->nullable();
               $table->string('total_prc',20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storeloan_items');
    }
};
