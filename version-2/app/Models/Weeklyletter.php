<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin;

class Weeklyletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'author_id'
    ];

    public function author(){
        return $this->belongsTo(Admin::class);
    }
}
