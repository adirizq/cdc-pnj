<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'sector',
        'location',
        'website',
        'established',
        'description',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function vacancies() {
        return $this->belongsToMany(Vacancy::class);
    }
}
