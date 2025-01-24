<?php

namespace App\Models;

use App\Enums\ArticleStatus;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasSEO;
    // use CommandsTable; gak bisa di pakai karena package nya eror dari skeleton

    protected $fillable = [
        'title',
        'slug',
        'content',
        'user_id',
        'media_id'
    ];

    protected $casts = [
        'status' => ArticleStatus::class,
        'content' => 'array',
    ];

    public function scopeIsPublished(Builder $query): Builder
    {
        return $query->where('status', ArticleStatus::PUBLISHED);
    }

    public function image(): BelongsTo
    {
        return $this->BelongsTo(Media::class, 'media_id');
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->title,
            description: Str::limit(tiptap_converter()->asText($this->content, 100)),
            image: $this->image?->path,
        );
    }
}
