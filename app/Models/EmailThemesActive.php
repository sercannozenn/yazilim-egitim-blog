<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailThemesActive extends Model
{
    protected $table = "email_themes_active";
    protected $guarded = [];

    public function theme(): BelongsTo
    {
        return $this->belongsTo(EmailTheme::class, "theme_type_id", "id");
    }
    public function themeActive(): BelongsTo
    {
        return $this->belongsTo(EmailTheme::class, "theme_type_id", "id")
            ->where("status", 1);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
