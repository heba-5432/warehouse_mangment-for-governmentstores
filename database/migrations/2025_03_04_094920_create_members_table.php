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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name_id');
            $table->string('email')->unique();
           $table->string('mobil')->unique();

            $table->rememberToken();

            $table->string('item_id',100)->nullable();
            $table->string('borrowed_at',100)->nullable();//borrow start date
            $table->string('due_at',100)->nullable(); //borrow end date
            $table->string('returned_at',100)->nullable(); //days_period
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
        Schema::dropIfExists('members');
    }
};
