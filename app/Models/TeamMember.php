<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'department',
        'bio',
        'image',
        'email',
        'linkedin',
        'twitter',
        'skills',
        'location',
        'is_leadership',
        'is_featured',
        'is_active',
        'sort_order',
        'joined_date',
    ];

    protected $casts = [
        'skills' => 'array',
        'is_leadership' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'joined_date' => 'date',
    ];

    protected $attributes = [
        'is_leadership' => false,
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

    public function scopeLeadership(Builder $query): Builder
    {
        return $query->where('is_leadership', true);
    }

    public function scopeByDepartment(Builder $query, string $department): Builder
    {
        return $query->where('department', $department);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    // Accessors
    public function getFormattedSkillsAttribute()
    {
        if (!$this->skills) {
            return [];
        }

        return collect($this->skills)->pluck('skill')->filter();
    }

    public function getYearsExperienceAttribute()
    {
        if (!$this->joined_date) {
            return null;
        }

        return $this->joined_date->diffInYears(now());
    }
}
