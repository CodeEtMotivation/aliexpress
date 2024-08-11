<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MachineUser;
use App\Models\Parrainage;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class parrainageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $parraines = Parrainage::getParrainesByParrainId($user->id);

        return view('parrainage',compact('parraines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $id,string $montant,string $id2,string $id3)
    {
        
        $machineuser = MachineUser::find($id);

        $parrainage = Parrainage::find($id3);
        $parrainage->status = "recuperer";
        $parrainage->save();

        $user = Auth::user();
        $user->prime = $user->prime - $montant;
        $user->wallet = $user->wallet + $montant;
        $user->save();

        $message = 'Votre parrain ' . $user->name . ' a recuperer son pourcentage de 15% soit un montant de ' . $montant . ' fcfa sur votre prime blobal ce ci pour votre premier achat vip';
        Notification::create([
            'user_id' => $id2,
            'message' => $message,
        ]);
        
        return redirect()->route('parrainage');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
