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
        Schema::create('example', function (Blueprint $table) {
            $table->id();
            $table->string('code',50)->nullable();
            $table->string('name',100);
            $table->date('birth_date')->nullable();
            $table->string('address',255)->nullable();
            $table->string('email',100)->unique();
            $table->tinyInteger('active')->index()->default('0');
            $table->string('avatar',255)->nullable();
            $table->foreignId('user_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('example');
    }
};
