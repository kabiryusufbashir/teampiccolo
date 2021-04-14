<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Model\Course;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 'name', 'slug', 'url', 'description'
    ];

    public function course(){
        return $this->hasOne('Course::class');
    }
}
