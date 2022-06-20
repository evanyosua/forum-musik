<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Playlist extends Model
{
    use HasFactory;
    protected $table = 'create_playlist';
    protected $fillable = [
        'nama',
        'link'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
