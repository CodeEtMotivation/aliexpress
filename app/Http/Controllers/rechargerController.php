<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;

class rechargerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       if( $request->validate(['montantrecharger' => ['required', 'numeric', 'min:1'],]) && $request->montantrecharger >= 2400)
       {
            if($request->moyenPayement == "Orange Money"){
                return View('payer_orange',[
                    'moyenPayement' => $request->moyenPayement,
                    'montantrecharger' => $request->montantrecharger
                ]);
            }else{
                return View('payer_mtn',[
                    'moyenPayement' => $request->moyenPayement,
                    'montantrecharger' => $request->montantrecharger
                ]);
            }
       }else{
         
            return redirect()->route('recharger');
        
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
        Transaction::create([
            'type_transact' => $request->type_transact,
            'montant_transact' => $request->montant_transact,
            'state_transact' => $request->state_transact,
            'moyen_payement' => $request->moyen_payement,
            'user_id' => $request->user_id
        ]);

        // Rediriger vers la route 'dashboard'
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
        $transaction = Transaction::find($id);
        if($transaction->type_transact == "recharge")
        {
            $transaction->state_transact = "effectue";
            $transaction->save();
            
            $user_id = $transaction->user->id;
            $user = User::find($user_id);
            $montanta = $transaction->user->wallet;
            $montantn = $transaction->montant_transact;
            $montantf = $montanta + $montantn ;
            $user->wallet = $montantf;
            $user->save();

            return redirect()->route('adminTransactions');
        }else{
            $transaction->state_transact = "effectue";
            $transaction->save();
            
            $user_id = $transaction->user->id;
            $user = User::find($user_id);
            $montanta = $transaction->user->wallet;
            $montantn = $transaction->montant_transact;
            $montantf = $montanta - $montantn ;
            $user->wallet = $montantf;
            $user->save();

            return redirect()->route('adminTransactions');
        }
        

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
