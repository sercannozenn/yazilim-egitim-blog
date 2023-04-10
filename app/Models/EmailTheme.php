<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailTheme extends Model
{
    protected $guarded = [];

    public const THEME_TYPE = [
        "Tema Türü Seçiniz",
        "Kendim İçerik Oluşturmak İstiyorum",
        "Parola Sıfırlama Maili"
    ];
    public const PROCESS = [
        "İşlem Seçin",
        "Email Doğrulama Maili İçeriği",
        "Parola Sıfırlama Maili İçeriği",
        "Parola Sıfırlama İşlemi Tamamlandığında Gönderilecek Mail İçeriği"
    ];

    public function getThemeTypeAttribute($value):string
    {
        return self::THEME_TYPE[$value];
    }

    public function getProcessAttribute($value):string
    {
        return self::PROCESS[$value];
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

}
