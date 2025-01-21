<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'media_id',
    ];

    public function image(): BelongsTo
    {
        return $this->BelongsTo(Media::class, 'media_id');
    }
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
