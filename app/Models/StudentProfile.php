<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cv',
        'image',
        'title',
        'student_number',
        'major',
        'languages',
        'skills',
        'address',
        'phone',
        'about',
        'experience',
        'education',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function vacancies() {
        return $this->belongsToMany(Vacancy::class, 'applications')->withPivot('status')->withTimestamps();
    }
}
