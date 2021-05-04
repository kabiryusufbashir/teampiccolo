<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Client;

class Clientsendmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'message'
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
