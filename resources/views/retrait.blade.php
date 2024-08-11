<x-app-layout>
<main>
        <!--div class="header">
            <span>Recharger</span>
        </div -->
        <div class="prix">Solde: {{ Auth::user()->wallet }} fcfa</div>
        <p>Canal de retrait</p>
        <form action="{{ route('moyendepayement2') }}" method="post">
            @csrf
            <select name="moyenPayement" id="">
                <option value="Orange Money">Orange Money</option>
                <option value="MTN Mobile Money">MTN Mobile Money</option>
            </select>
            <label style="color:yellow;" for="">
                    NB: il faut choisir le moyen de payement correspondant au numero de 
                    telephone que vous avez utilises lors de l'inscription pour eviter tous desagrement ou perte 
                    du retrait
            </label>
            <input type="hidden" name="wallet" value="{{ Auth::user()->wallet }}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="text" name="montantretrait" id="montantrecharger"  placeholder="veuillez entrer le montant du retrait" require>
            <label style="color:yellow;" for="">
                    NB: les retraits se font du lundi a vendredi 
                    de 07h a 18h . montant minimum du retrait 5000 fcfa
            </label>

            <div class="prixs">
                <div class="df">
                        <div id="5k" class="prix">5,000</div>
                        <div id="8k" class="prix">8,000</div>
                        <div id="10k" class="prix">10,000</div>
                </div>
                <div class="df">
                    <div id="20k" class="prix">20,000</div>
                    <div id="30k" class="prix">30,000</div>
                    <div id="50k" class="prix">50,000</div>
                </div>
                <div class="df">
                    <div id="80k" class="prix">80,000</div>
                    <div id="100k" class="prix">100,000</div>
                    <div id="150k" class="prix">150,000</div>
                </div>
                <div class="df">
                    <div id="200k" class="prix">200,000</div>
                    <div id="300k" class="prix">300,000</div>
                    <div id="500k" class="prix">500,000</div>
                </div>
            </div>

            @php
                $user = Auth::user();
                
                $currentHour = \Carbon\Carbon::now()->hour;
                $currentDay = \Carbon\Carbon::now()->dayOfWeek;
            @endphp

            @if ($currentHour >= 7 && $currentHour <= 23 && $currentDay >= 0 && $currentDay <= 7 && $user->hasPendingWithdrawals() != true)
                <input type="submit" value="Retrait">
            @else
                <label style="color:yellow;" for="">
                        NB: si vous avez un retrait "en attente" , vous devrez attendre que l'administrateur valide ce
                        retrait avant d'essayer d'effectuer un autre retrait
                </label>
            @endif
            
            <br><br><br>
        </form>
    </main>


    

</x-app-layout>
