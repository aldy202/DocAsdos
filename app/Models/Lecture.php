<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'lecture_id');
    }

    public function documentations()
    {
        return $this->hasMany(Course::class, 'lecture_id');
    }
}

