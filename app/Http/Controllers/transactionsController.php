<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Machine;
use App\Models\User;
use Carbon\Carbon;

class transactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::where('state_transact', 'en attente')->orderBy('id', 'desc')
        ->get();
        $transactions2 = Transaction::where('state_transact', 'effectue')->orderBy('id', 'desc')
        ->get();

        return view('adminTransactions',
        [
           'transactions'  => $transactions,
           'transactions2'  => $transactions2
        ]);
    }

    public function index2()
    {
        // Récupérer tous les utilisateurs avec leurs machines
        $users = User::with('machines')->get();

        // Mise à jour de next_date si nécessaire
        /*foreach ($users as $user) {
            foreach ($user->machines as $machine) {
                $pivot = $machine->pivot;
                $nextDate = Carbon::parse($pivot->next_date);
                $currentDate = Carbon::now();

                if ($currentDate->isSameDay($nextDate) && ($currentDate->diffInDays($machine->pivot->created_at) + 1) < $machine->nbr_jour) {
                    // Met à jour next_date en ajoutant un jour
                    $montant= ($machine->montant_mach * $machine->pourcentage)/100;
                    $pivot->current_amount = $pivot->current_amount +  $montant;
                    $pivot->next_date = $currentDate->addDay();
                    $pivot->save();
                }
            }
        }*/
        
        return view('adminPrimes',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // Trouver l'enregistrement de la table pivot à l'aide du modèle Eloquent
        $pivot = \App\Models\MachineUser::find($id);

        if ($pivot) {
            $machineId = $pivot->machine_id;
            $userId = $pivot->user_id;

            // Trouver les instances de User et Machine
            $user = User::find($userId);
            $machine = Machine::find($machineId);

            // Calculer le montant à ajouter
            $montant = ($machine->montant_mach * $machine->pourcentage) / 100;

            // Mettre à jour le montant actuel dans la table pivot
            $pivot->current_amount += $montant;
            $pivot->save();

            // Mettre à jour les informations de l'utilisateur
            $user->prime += $montant;
            $user->wallet += $montant;
            $user->save();

            return redirect()->route('adminPrimes')->with('error', 'Enregistrement trouvé.');
        }

    // Si le pivot n'est pas trouvé, rediriger ou afficher une erreur
    return redirect()->route('adminPrimes')->with('error', 'Enregistrement non trouvé.');
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
