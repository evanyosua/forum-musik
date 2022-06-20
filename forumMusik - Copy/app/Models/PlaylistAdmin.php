<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistAdmin extends Model
{
    use HasFactory;
    protected $table = 'playlistadmins';
    protected $fillable = [
        'nama',
        'link'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
