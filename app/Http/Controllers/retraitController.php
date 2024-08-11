<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;

class retraitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $wallet = $request->wallet;
        if( $request->validate(['montantretrait' => ['required', 'numeric', 'min:1'],]) && $request->montantretrait <= $wallet && $request->montantretrait >= 5000 )
       {
        Transaction::create([
            'type_transact' => "retrait",
            'montant_transact' => $request->montantretrait,
            'state_transact' => "en attente",
            'moyen_payement' => $request->moyenPayement,
            'user_id' => $request->user_id
        ]);

        // Rediriger vers la route 'dashboard'
        return redirect()->route('dashboard');
       }else{ 
        return redirect()->route('retrait');
       }
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
    public function store(Request $request)
    {
        //
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
