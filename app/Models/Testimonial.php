<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_title',
        'company_name',
        'testimonial',
        'client_image',
        'company_logo',
        'metrics',
        'project_type',
        'rating',
        'is_featured',
        'is_active',
        'sort_order',
        'project_date',
    ];

    protected $casts = [
        'metrics' => 'array',
        'rating' => 'decimal:1',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'project_date' => 'date',
    ];

    protected $attributes = [
        'rating' => 5.0,
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

    public function scopeByProjectType(Builder $query, string $projectType): Builder
    {
        return $query->where('project_type', $projectType);
    }

    public function scopeByRating(Builder $query, float $minRating = 4.0): Builder
    {
        return $query->where('rating', '>=', $minRating);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    // Accessors
    public function getFormattedProjectTypeAttribute(): string
    {
        $types = [
            'web-development' => 'Web Development',
            'mobile-app' => 'Mobile App Development',
            'ecommerce' => 'E-commerce Solution',
            'branding' => 'Branding & Design',
            'digital-marketing' => 'Digital Marketing',
            'consulting' => 'Business Consulting',
            'custom-software' => 'Custom Software',
            'maintenance' => 'Website Maintenance',
        ];

        return $types[$this->project_type] ?? ucfirst(str_replace('-', ' ', $this->project_type));
    }

    public function getStarRatingAttribute(): string
    {
        $fullStars = floor($this->rating);
        $halfStar = ($this->rating - $fullStars) >= 0.5;

        $stars = str_repeat('★', $fullStars);
        if ($halfStar) {
            $stars .= '☆';
        }

        return $stars;
    }

    public function getFormattedMetricsAttribute()
    {
        if (! $this->metrics) {
            return [];
        }

        return collect($this->metrics)->map(function ($metric) {
            return [
                'label' => $metric['label'] ?? '',
                'value' => $metric['value'] ?? '',
            ];
        });
    }
}
