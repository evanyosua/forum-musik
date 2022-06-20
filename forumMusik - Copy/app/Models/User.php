<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     *
     */
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'image', 'nama', 'email', 'password', 'date_of_birth', 'home_address',
        'gender', 'genre_fav1', 'genre_fav2'
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

    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    public function isMember()
    {
        return $this->role == 'member';
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }

    public function playlistAdmin()
    {
        return $this->hasMany(PlaylistAdmin::class);
    }

    public function getImageUrlAttribute($newImageName)
    {
        return Storage::disk('public')->url($this->image);
    }


    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }
}
