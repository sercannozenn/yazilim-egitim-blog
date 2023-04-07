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
        Schema::table('settings', function (Blueprint $table) {
            $table->string("seo_keywords_home")->nullable()->after("header_text");
            $table->string("seo_description_home")->nullable()->after("header_text");
            $table->string("seo_keywords_articles")->nullable()->after("header_text");
            $table->string("seo_description_articles")->nullable()->after("header_text");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};
