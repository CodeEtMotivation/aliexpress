<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Transaction;
use App\Models\Machine;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'tel',
        'password',
        'state',
        'wallet',
        'referral_code',
        'prime'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->referral_code = strtoupper(Str::random(6)); // Génération du code unique à 6 caractères
        });
    }


    public function transactions()
    {
        return $this->hasMany(Transaction::class)->orderBy('id', 'desc');
    }

    public function machines()
    {
        return $this->belongsToMany(Machine::class)->withPivot('id','current_amount','next_date')->withTimestamps();
    }

    /*public function parrainagesParraine()
    {
        return $this->hasMany(Parrainage::class, 'parraine_id');
    }

    public function parrainagesParrain()
    {
        return $this->hasMany(Parrainage::class, 'parrain_id');
    }*/


    public function hasPendingWithdrawals()
    {
        // Parcourt toutes les transactions de type "retrait" pour cet utilisateur
        foreach ($this->transactions()->where('type_transact', 'retrait')->get() as $transaction) {
            // Si l'une de ces transactions est en attente, retourne true
            if ($transaction->state_transact === 'en attente') {
                return true;
            }
        }
        // Si aucune transaction en attente n'est trouvée, retourne false
        return false;
    }

    public function appliquerGainsParrainage()
    {
        $parrainage = $this->parrainagesParraine->first();
        if ($parrainage) {
            $parrain = $parrainage->parrain;
            $premiereMachine = $this->machines()->orderBy('pivot_purchase_date', 'asc')->first();

            if ($premiereMachine && now()->diffInDays($premiereMachine->pivot->purchase_date) >= 90) {
                $gain = $premiereMachine->pivot->current_amount * 0.15;
                // Créditer le gain au parrain
                // Exemple : $parrain->wallet += $gain;
                // $parrain->save();
            }
        }
    }


}
