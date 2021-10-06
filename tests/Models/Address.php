<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static Address create(array $array)
 * @method static Address make(array $array)
 */
class Address extends Model
{
    protected $fillable = ['address'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
