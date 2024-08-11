<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Machine extends Model
{
    use HasFactory;
    protected $fillable = [
        'montant_mach',
        'pourcentage',
        'nbr_jour',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('id','current_amount')->withTimestamps();
    }


    public static function getMachineById(int $id)
    {
        return self::find($id);
    }
}
