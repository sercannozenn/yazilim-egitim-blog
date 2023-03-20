<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Settings::create([
            'logo' => "",
            'category_default_image' => "",
            'article_default_image' => "",
            "header_text" => "lorem",
            "footer_text" => "lorem",
            "video_is_active" => 1,
            "author_is_active" => 1,
            "feature_categories_is_active" => 1,
        ]);
    }
}
