<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_type', 'amount', 'transaction_details', 'date_of_transaction'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
