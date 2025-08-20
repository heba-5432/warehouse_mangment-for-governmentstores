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
        Schema::create('store_returned_used_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_owneru',6);
            $table->string('item_store_idu',6);
            $table->string('number_returnu',6)->nullable();
           $table->string('returned_dateu',100)->nullable();
            $table->string('noticeisu',250)->nullable();
            $table->string('statusu',20)->nullable();
  $table->string('used_curr_no',20)->nullable();
    $table->string('add_to_user3',20)->nullable();
    $table->string('sta_return',20)->nullable();
   $table->string('dateofreturned',20)->nullable();
    $table->string('edit_disu',5)->nullable();
   $table->string('dele_disu',5)->nullable();
   $table->string('priceu_one',20)->nullable();

$table->string('used_price',20)->nullable();
       $table->string('still_exits1',20)->nullable()->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_returned_used_items');
    }
};
