<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static make(array $array)
 */
class Comment extends Model
{
    protected $fillable = [
        'header',
        'body',
    ];

    public function related_post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
