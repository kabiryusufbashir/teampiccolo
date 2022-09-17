<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin;

class Blog extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'photo', 'content', 'category', 'author', 'status'
    ];

    public function author(){
        return $this->belongsTo(Admin::class);
    }    
}
