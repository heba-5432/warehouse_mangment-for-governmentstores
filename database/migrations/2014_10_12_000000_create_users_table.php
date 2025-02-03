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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->default(rand(10,9000));
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('depar_id',100)->nullable();
            $table->string('position_id',100)->nullable();
            $table->string('national_id',100)->nullable();
            $table->string('role_id',100)->nullable();
            $table->string('created_by',100)->nullable();
            $table->string('edit_by',100)->nullable();
            $table->string('email_status',100)->nullable();

            $table->string('status_registered',2)->default(0);
            $table->string('adminnotreviewd',2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
