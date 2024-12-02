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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 20)->unique()->nullable(false);
            $table->string('name', 255)->nullable(false);
            $table->integer('stock')->nullable(false);
            $table->string('avatar', 255)->nullable(false);
            $table->date('expired_at')->nullable(false);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->boolean('flag_delete')->default(false)->nullable(false);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('product_category')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
