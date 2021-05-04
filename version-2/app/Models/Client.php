<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Clientsendmail;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone_number', 'website', 'address', 'company', 'photo', 'contract_description', 'date_signed'
    ];

    public function sendmail(){
        return $this->hasMany(Clientsendmail::class);
    }
}
