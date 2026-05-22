<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company',
        'position',
        'project_type',
        'budget',
        'timeline',
        'message',
        'status',
        'notes',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accessor for full name
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    // Accessor for formatted project type
    public function getFormattedProjectTypeAttribute()
    {
        $types = [
            'web-development' => 'Web Development',
            'mobile-app' => 'Mobile App Development',
            'ui-ux-design' => 'UI/UX Design',
            'business-intelligence' => 'Business Intelligence',
            'digital-transformation' => 'Complete Digital Transformation',
            'consultation' => 'Strategy Consultation',
            'other' => 'Other',
        ];

        return $types[$this->project_type] ?? $this->project_type;
    }

    // Accessor for formatted budget
    public function getFormattedBudgetAttribute()
    {
        $budgets = [
            'under-5k' => 'Under $5K',
            '5k-15k' => '$5K - $15K',
            '15k-50k' => '$15K - $50K',
            '50k-100k' => '$50K - $100K',
            'over-100k' => 'Over $100K',
            'discuss' => 'Prefer to discuss',
        ];

        return $budgets[$this->budget] ?? $this->budget;
    }

    // Accessor for formatted timeline
    public function getFormattedTimelineAttribute()
    {
        $timelines = [
            'asap' => 'ASAP',
            '1-3-months' => '1-3 months',
            '3-6-months' => '3-6 months',
            '6-12-months' => '6-12 months',
            'flexible' => 'Flexible',
        ];

        return $timelines[$this->timeline] ?? $this->timeline;
    }
}
