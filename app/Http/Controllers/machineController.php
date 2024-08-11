<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use Illuminate\Support\Facades\Auth;

class machineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $machines = Machine::all();
        $userMachines = $user->machines->pluck('id')->toArray();

        return view('machines',[
            'machines' => $machines,
            'userMachines' => $userMachines
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('machineform');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Machine::create([
            'montant_mach' => $request->montant_mach,
            'pourcentage' => $request->pourcentage,
            'nbr_jour' => $request->nbr_jour
        ]);

        return redirect()->route('parametres');
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
