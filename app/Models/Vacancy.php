<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'company_profile_id',
        'status',
        'title',
        'position',
        'vacancy_type',
        'experience',
        'qualification_degree',
        'description',
        'responsibilities',
        'qualifications',
        'skills',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function companyProfile() {
        return $this->belongsTo(CompanyProfile::class);
    }

    public function studentProfiles() {
        return $this->belongsToMany(StudentProfile::class, 'applications')->withPivot('status')->withTimestamps();;
    }
}
