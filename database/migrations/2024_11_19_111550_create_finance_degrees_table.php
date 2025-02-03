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
        Schema::create('finance_degrees', function (Blueprint $table) {
            $table->id();
            $table->string('fin_title');
            $table->string('fin_descreption')->nullable();
            $table->string('disrole_id')->nullable();
            $table->string('created_by',100)->nullable();
            $table->string('edit_by',100)->nullable();
            $table->string('salary',100)->nullable();
            $table->string('fin_ser',10)->default(0);
            $table->string('allow1',100)->nullable()->default(0);
            $table->string('allow2',100)->nullable()->default(0);
            $table->string('allow3',100)->nullable()->default(0);
            $table->string('deduct1',100)->nullable()->default(0);
            $table->string('deduct2',100)->nullable()->default(0);
            $table->string('deduct3',100)->nullable()->default(0);
            $table->string('total_deduct',100)->nullable()->default(0);
            $table->string('total_allow',100)->nullable()->default(0);
            $table->string('total_after_deduct',100)->nullable()->default(0);
            $table->string('total_after_allow',100)->nullable()->default(0);
            $table->string('total_of_all',100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_degrees');
    }
};
