<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'message'
    ];

    public static function getNotificationsByUserId($userId)
    {
        return self::where('user_id', $userId)->get();
    }
}
