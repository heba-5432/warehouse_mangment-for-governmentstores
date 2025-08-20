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
        Schema::create('itemscreates', function (Blueprint $table) {
            $table->id();
            $table->string('title_ara',100);
            $table->string('title_eng',100)->nullable();
            $table->string('auther1',200)->nullable();
            $table->string('coauther2',200)->nullable();
            $table->string('coauther3',200)->nullable();
            $table->string('coauther4',200)->nullable();
            $table->string('coauther5',200)->nullable();
            $table->string('barcode_number',200)->nullable();
            $table->string('introduction',200)->nullable();
            $table->string('summery',200)->nullable();
            $table->string('location',200)->nullable();
            $table->string('copies_number',6)->nullable()->default(1);
            $table->string('profil_impath')->nullable();

            $table->string('files_path')->nullable();
            $table->string('catogery_id',100)->nullable();
            $table->string('catogery2_id',100)->nullable();
            $table->string('keyword_id',100)->nullable();
            $table->string('visible',2)->nullable()->default(1);
            $table->string('locked',2)->nullable()->default(1);
            $table->string('created_by',100)->nullable();
            $table->string('edit_by',100)->nullable();
            $table->string('store_owner_id',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itemscreates');
    }
};
