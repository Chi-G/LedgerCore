<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'icon',
        'image',
        'features',
        'tech_stack',
        'pricing_tiers',
        'category',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
        'tech_stack' => 'array',
        'pricing_tiers' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected $attributes = [
        'category' => 'development',
        'is_featured' => false,
        'is_active' => true,
        'sort_order' => 0,
    ];

    // Scopes
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    // Accessors
    public function getFormattedCategoryAttribute(): string
    {
        return ucfirst($this->category);
    }

    public function getFormattedFeaturesAttribute()
    {
        if (! $this->features) {
            return [];
        }

        return collect($this->features)->pluck('feature')->filter();
    }

    public function getFormattedTechStackAttribute()
    {
        if (! $this->tech_stack) {
            return [];
        }

        return collect($this->tech_stack)->pluck('technology')->filter();
    }

    // Route key name for slug-based routing
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
