<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Enums\ArticleStatus;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Illuminate\Testing\Fluent\Concerns\Has;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model implements Viewable
{
    use HasFactory;
    use SoftDeletes;
    use HasSEO;
    use InteractsWithViews;
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
