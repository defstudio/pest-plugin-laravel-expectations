<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static Post create(array $array)
 * @method static Post make(array $array)
 */
class Post extends Model
{
    protected $fillable = [
        'title',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function posted_comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
