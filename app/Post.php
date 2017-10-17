<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Post
 *
 * @package App
 */
class Post extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @param $value
     *
     * @return Carbon
     */
    public function getCreatedAtAttribute($value)
    {
        return new Carbon($value);
    }

    /**
     * @param $value
     *
     * @return Carbon
     */
    public function getUpdatedAtAttribute($value)
    {
        return new Carbon($value);
    }
}
