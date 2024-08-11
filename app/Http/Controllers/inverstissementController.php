<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use Illuminate\Support\Facades\Auth;

class inverstissementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Récupérer l'utilisateur actuellement connecté
         $user = Auth::user();

         // Récupérer toutes les machines associées à cet utilisateur
         $machines = $user->machines;
 
         // Retourner une vue avec les machines
         return view('investissement', compact('machines'));
        
        
      
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
    public function store(string $id)
    {
        $user = Auth::user();
        $machine = Machine::find($id);
        $user->wallet = $user->wallet - $machine->montant_mach;
        $user->save();
        $user->machines()->attach($machine);

        
        return redirect()->route('dashboard');
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
