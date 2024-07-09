<?php

namespace App\Models;

use App\Cart\Purchasable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Product extends Model implements Purchasable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'link',
        'thumbnail',
        'cover',
        'user_id',
        'category_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setSlugAttribute($value): void
    {
        $this->attributes['slug'] = Str::slug($value);
    }
}
