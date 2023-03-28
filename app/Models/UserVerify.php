<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserVerify extends Model
{
    protected $fillable = ['user_id', 'token'];

    protected $table = "users_verify";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,  "user_id", "id");
    }
}
