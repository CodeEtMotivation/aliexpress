<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_transact',
        'montant_transact',
        'state_transact',
        'moyen_payement',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    } 


    
}
