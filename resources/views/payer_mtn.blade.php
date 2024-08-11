<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ali express</title>
    @vite(['resources/css/payer.css'])
</head>
<body>
    
    <div class="wrapper">
    <form method="post" action="{{ route('moyendepayementeffectif') }}">
    @csrf
        <div class="text-center">Paiement bancaire <span class="time">09:43</span></div>

        <div class="bg-white d-flex flex-column">
            <div class="title">Listes des banques</div>
            <div class="operateur d-flex" style="gap:5px;margin-top: 10px;">
                <div >Orange Money</div>
                <div style="background-color: #4ed14e;color:white">MTN Money</div>
            </div>
        </div>

        <div class="bg-white mx-5">
            <div class="d-flex mx-5 space-between">
                <div class="d-flex flex-column">
                <span class="title">Montant du Paiement</span>
                        <span class="price">{{ $montantrecharger }} fcfa</span>
                        <input type="hidden" name="type_transact" value="recharge">
                        <input type="hidden" name="montant_transact" value="{{ $montantrecharger }}">
                        <input type="hidden" name="state_transact" value="en attente">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="moyen_payement" value="MTN Mobile Money">
                </div>
                
            </div>
            <div class="d-flex flex-column mx-5 space-between">
                <span class="title">Nom de la banque</span>
                <span>MTN Mobile Money</span>
            </div>
            <div class="d-flex mx-5 space-between">
                <div class="d-flex flex-column">
                    <span class="title">Nom</span>
                    <span >Memdjo</span>
                </div>
                <div class="copie">effectuer un depot au numero indiquer pour effectuer votre recharge</div>
            </div>
            <div class="d-flex mx-5 space-between">
                <div class="d-flex flex-column">
                    <span class="title">Code commercial</span>
                    <span style="width: 50%;">*126*14*682722663*Montant#</span>
                </div>
                
            </div>
        </div>

        <div class="info">
                Chers clients, veuillez effectuer un dépôt au numéro indiqué ci-dessus pour pouvoir effectuer votre recharge.
                Une fois cette opération effectuée, cliquez sur "paiement terminé". Votre recharge sera alors en attente de vérification et de validation par les administrateurs.
                La vérification et la validation par les administrateurs peuvent prendre beaucoup de temps compte tenu de l'importance du trafic quotidien sur le site. 
                trafic journalier sur le site.
                Nb : si vous cliquez sur Paiement terminé sans avoir au préalable effectué un dépôt au numéro ci-dessus, alors
                votre recharge ne sera jamais validée, elle restera en attente et sera perdue dans le flux des transactions sur le site.
                ne vous laissez pas abuser
        </div>

        <div style="padding:20px;font-family: Arial, Helvetica, sans-serif;font-size: 20px;color:white;text-align: center;background-color: rgb(9, 175, 9);">
                <button style="padding:7px 14px;color:white;background:green;border:0px;" type="submit">Paiement terminé</button>
        </div>
        </form>
    </div>


    


    
</body>
</html>