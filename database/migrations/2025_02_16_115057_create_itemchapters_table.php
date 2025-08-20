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
        Schema::create('itemchapters', function (Blueprint $table) {
            $table->id();
            $table->string('chapterno',100)->nullable();
            $table->string('chapter_title',100);
            $table->string('chapter_part1',2000)->nullable();
            $table->string('chapter_part2',2000)->nullable();
            $table->string('chapter_part3',1500)->nullable();

            $table->string('chapter_part4',1500)->nullable();
            $table->string('item_id',2);
            $table->string('cover_imgpath')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->string('visiblitych')->nullable()->default(1); //shown
            $table->string('lockch')->nullable()->default(1); //shown
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
        Schema::dropIfExists('itemchapters');
    }
};
