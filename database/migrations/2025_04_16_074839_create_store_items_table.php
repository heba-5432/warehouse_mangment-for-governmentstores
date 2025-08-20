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
        Schema::create('store_items', function (Blueprint $table) {
            $table->id();
           $table->string('seller_infoi',200)->nullable();
            $table->string('request_owneri',200)->nullable();
            $table->string('descriptioni',200)->nullable();
            $table->string('imgpathi')->nullable();
            $table->string('files_pathi')->nullable();
            $table->string('locationi',200)->nullable();
            $table->string('barcode_numberi',200)->nullable();
              $table->string('items1_number',200)->nullable();

            $table->string('title_arai',100);
            $table->string('title_engi',100)->nullable();
            $table->string('notice',250)->nullable();

            $table->string('qauntatyi',6)->nullable()->default(1);
            $table->string('current_qauntaty',6)->nullable();

            $table->string('catogery_idi',100)->nullable();
            $table->string('status_idi',100)->nullable();
            $table->string('status2_idi',100)->nullable();
           $table->string('created_by',100)->nullable();
            $table->string('edit_by',100)->nullable();
            $table->string('add_datei',100)->nullable();
             $table->string('new_price',20)->nullable();
            $table->string('total_pricen',20)->nullable();

              $table->string('current_total_pricen',30)->nullable();
       $table->string('still_exits2',20)->nullable()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_items');
    }
};
