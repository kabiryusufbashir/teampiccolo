<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Model\Course;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug'
    ];

    public function course(){
        return $this->hasOne('Course::class');
    }
}
