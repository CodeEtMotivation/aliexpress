<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parrainage extends Model
{
    use HasFactory;

    protected $fillable = [
        'parrain_id',
        'parraine_id',
    ];

    public static function getParrainesByParrainId($parrainId)
    {
        return self::where('parrain_id', $parrainId)
                    ->get(['id', 'parraine_id']);
    }

    
    /*public function parraine()
    {
        return $this->belongsTo(User::class, 'parraine_id');
    }*/
}
