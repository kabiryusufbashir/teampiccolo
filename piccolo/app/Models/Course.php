<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Video;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'photo'
    ];

    public function video(){
        return $this->hasMany(Video::class);
    }
}
