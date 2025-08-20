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
        Schema::create('store_corrupt_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_ownerc',6);
            $table->string('item_store_idc',6);
            $table->string('number_returnc',6)->nullable();

             $table->string('curr_no_corrupted',6)->nullable();
           $table->string('returned_datec',100)->nullable();
            $table->string('noticeisc',250)->nullable();
            $table->string('statusc',20)->nullable();

             $table->string('pricec_one',20)->nullable();
      $table->string('corr_price',20)->nullable();
      $table->string('dateofreturned',30)->nullable();
       $table->string('still_exits',20)->nullable()->default(1);
       $table->string('add_to_user3c',10)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_corrupt_items');
    }
};
