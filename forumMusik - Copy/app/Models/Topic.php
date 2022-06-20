<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Topic extends Model
{
    use HasFactory;

    protected $table = 'topics';
    protected $primaryKey = 'topicID';
    protected $fillable = ['genre', 'title', 'description', 'slug', 'created_at', 'pinned', 'updated_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilterbyGenres($builder)
    {

        if (request()->query('genre')) {
            $genre = Genre::where('slug', request()->query('genre'))->first();

            if ($genre) {
                return $builder->where('genre_id', $genre->id);
            }
            return $builder;
        }
        return $builder;
    }

    public function replies()
    {
        return $this->hasMany(Reply::class, 'topic_id', 'topicID');
    }
}
