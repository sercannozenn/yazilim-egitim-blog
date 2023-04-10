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
        Schema::create('email_themes_active', function (Blueprint $table) {
            $table->tinyInteger("process_id");
            $table->unsignedBigInteger("theme_type_id");
            $table->unsignedBigInteger("user_id");
            $table->timestamps();

            $table->foreign("theme_type_id")
                ->on("email_themes")
                ->references("id")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_themes_active');
    }
};
