<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Support\Str;
use PharIo\Manifest\License;
use Laravel\Scout\Searchable;
use Awcodes\Curator\Models\Media;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    use HasSEO;
    use Searchable;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'text_color',
        'background_color',
        'media_id',
        'user_id',
        'is_tag',
        'parent_id'
    ];

    protected $casts = [
        'content' => 'array'
    ];

    public function image(): BelongsTo
    {
        return $this->BelongsTo(Media::class, 'media_id');
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_category');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->title,
            description: tiptap_converter()->asText(Str::limit($this->content, 160)),
            image: $this->image?->path,
        );
    }
}
