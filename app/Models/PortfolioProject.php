<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PortfolioProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'industry',
        'complexity',
        'image',
        'fallback_image',
        'metrics',
        'tech_stack',
        'color',
        'case_study_content',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'metrics' => 'array',
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
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

    public function scopeByIndustry(Builder $query, string $industry): Builder
    {
        return $query->where('industry', $industry);
    }

    public function scopeByComplexity(Builder $query, string $complexity): Builder
    {
        return $query->where('complexity', $complexity);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    // Accessors
    public function getFormattedIndustryAttribute(): string
    {
        $industries = [
            'real-estate' => 'Real Estate',
            'healthcare' => 'Healthcare',
            'fashion' => 'Fashion',
            'technology' => 'Technology',
            'automotive' => 'Automotive',
        ];

        return $industries[$this->industry] ?? ucfirst($this->industry);
    }

    public function getFormattedComplexityAttribute(): string
    {
        return ucfirst($this->complexity);
    }
}
