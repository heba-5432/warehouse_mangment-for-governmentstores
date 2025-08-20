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
        Schema::create('versionchapters', function (Blueprint $table) {
            $table->id();
            $table->string('chapternocv',100)->nullable();
            $table->string('chapter_titlecv',100);
            $table->string('chapter_part1cv',2000)->nullable();
            $table->string('chapter_part2cv',2000)->nullable();
            $table->string('chapter_part3cv',1500)->nullable();

            $table->string('chapter_part4cv',1500)->nullable();
            $table->string('ver_id',2);
            $table->string('cover_imgpathcv')->nullable();
            $table->string('file_namecv')->nullable();
            $table->string('file_pathcv')->nullable();
            $table->string('visiblitycv')->nullable()->default(1); //shown
            $table->string('lockcv')->nullable()->default(1); //shown
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
        Schema::dropIfExists('versionchapters');
    }
};
