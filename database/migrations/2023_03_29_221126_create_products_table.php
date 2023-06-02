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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer("sub_category_id")->nullable();
            $table->integer("section_id")->nullable();
            $table->string("title")->nullable();
            $table->string("slug")->nullable();
            $table->decimal("amount")->default(0);
            $table->decimal("discount")->default(0);
            $table->integer("recommendation")->default(0);
            $table->text("description")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
