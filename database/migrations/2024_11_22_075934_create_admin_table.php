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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100)->unique()->nullable(false);
            $table->string('user_name', 100)->unique()->nullable(false);
            $table->date('birthday')->nullable(false);
            $table->string('first_name', 100)->nullable(false);
            $table->string('last_name', 100)->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('reset_password')->nullable();
            $table->tinyInteger('status')->nullable(false);
            $table->boolean('flag_delete')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
