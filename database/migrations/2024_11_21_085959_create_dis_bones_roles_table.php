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
        Schema::create('dis_bones_roles', function (Blueprint $table) {
            $table->id();
            $table->string('dis_title');
            $table->string('dis_descreption')->nullable();
            $table->string('allowb1',100)->nullable()->default(0);
            $table->string('allowb2',100)->nullable()->default(0);
            $table->string('allowb3',100)->nullable()->default(0);
            $table->string('deductb1',100)->nullable()->default(0);
            $table->string('deductb2',100)->nullable()->default(0);
            $table->string('deductb3',100)->nullable()->default(0);
            $table->string('total_dis',5)->default(0)->nullable();
            $table->string('total_bones', 5)->default(0)->nullable();
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
        Schema::dropIfExists('dis_bones_roles');
    }
};
