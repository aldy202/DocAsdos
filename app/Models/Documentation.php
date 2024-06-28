<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'course_id',
        'lecture_id',
        'image',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lecture()
    {
        return $this->belongsTo(Lecture::class, 'lecture_id');
    }
    
}
