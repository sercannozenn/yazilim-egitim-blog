<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "username",
        "about",
        "image",
        "google_id",
        "facebook_id",
        "twitter_id",
        "github_id",
        "status",
        "email_verified_at",
        "is_admin"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeStatus($query, $status)
    {
        if (!is_null($status))
            return $query->where("status", $status);
    }

    public function scopeIsAdmin($query, $isAdmin)
    {
        if (!is_null($isAdmin))
            return $query->where("is_admin", $isAdmin);
    }

    public function scopeSearchText($query, $searchText)
    {
        if (!is_null($searchText))
        {
            return $query->where(function($q) use ($searchText)
            {
                $q->where("name", "LIKE", "%" . $searchText . "%")
                    ->orWhere("email", "LIKE", "%" . $searchText . "%")
                    ->orWhere("username", "LIKE", "%" . $searchText . "%");
            });
        }

    }

    public function articles():HasMany
    {
        return $this->hasMany(Article::class, "user_id", "id");
    }

    public function categories():HasMany
    {
        return $this->hasMany(Category::class, "user_id", "id");
    }

    public function articleLike():HasMany
    {
        return $this->hasMany(UserLikeArticle::class, "user_id", "id");
    }
    public function commentLike():HasMany
    {
        return $this->hasMany(UserLikeComment::class, "user_id", "id");
    }

    public function hasLogs(): HasMany
    {
        return $this->hasMany(Log::class,'user_id', 'id');
    }

    public function logs(): MorphMany
    {
        return $this->morphMany(Log::class, 'loggable');
    }

}
