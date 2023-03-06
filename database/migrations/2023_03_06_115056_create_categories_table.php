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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->boolean("status")->default(0);
            $table->boolean("feature_status")->default(0);
            $table->string("description")->nullable();
            $table->unsignedBigInteger("parent_id")->nullable();
            $table->integer("order")->default(0);
            $table->string("seo_keywords")->nullable();
            $table->string("seo_description")->nullable();
            $table->unsignedBigInteger("user_id");
            $table->timestamps();

            $table->foreign("parent_id")->references("id")->on("categories");
            $table->foreign("user_id")->on("users")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
