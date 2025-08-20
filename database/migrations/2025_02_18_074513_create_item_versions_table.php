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
        Schema::create('item_versions', function (Blueprint $table) {
            $table->id();
            $table->string('title_arav',100);
            $table->string('title_engv',100)->nullable();
            $table->string('main_item_v1',100);
            $table->string('auther1v',200)->nullable();
            $table->string('coauther2v',200)->nullable();
            $table->string('coauther3v',200)->nullable();
            $table->string('coauther4v',200)->nullable();
            $table->string('coauther5v',200)->nullable();
            $table->string('barcode_numberv',200)->nullable();
            $table->string('introductionv',200)->nullable();
            $table->string('summeryv',200)->nullable();
            $table->string('locationv',200)->nullable();
            $table->string('copies_numberv',6)->nullable()->default(1);
            $table->string('ver_impathv')->nullable();

            $table->string('verfile_pathv')->nullable();
            $table->string('catogery_idv',100)->nullable();
            $table->string('catogery2_idv',100)->nullable();
            $table->string('keyword_idv',100)->nullable();
            $table->string('visiblev',3)->nullable()->default(1);
            $table->string('lockedv',3)->nullable()->default(1);
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
        Schema::dropIfExists('item_versions');
    }
};
