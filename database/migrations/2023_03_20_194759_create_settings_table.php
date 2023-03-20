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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("logo")->nullable();
            $table->string("header_text")->nullable();
            $table->boolean("feature_categories_is_active")->default(1);
            $table->boolean("video_is_active")->default(1);
            $table->boolean("author_is_active")->default(1);
            $table->string("footer_text")->nullable();
            $table->string("category_default_image")->nullable();
            $table->string("article_default_image")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
