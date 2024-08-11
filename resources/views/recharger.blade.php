<x-app-layout>
<main>
        <!--div class="header">
            <span>Recharger</span>
        </div -->
        <div class="prix">Solde: {{ Auth::user()->wallet }} fcfa</div>
        <p>Canal de recharge</p>
        <form action="{{ route('moyendepayement') }}" method="post">
            @csrf
            <select name="moyenPayement" id="">
                <option value="Orange Money">Orange Money</option>
                <option value="MTN Mobile Money">MTN Mobile Money</option>
            </select>
            <label style="color:yellow;" for="">
                    NB: il faut choisir le moyen de payement correspondant au numero de 
                    telephone que vous avez utilises lors de l'inscription pour eviter tous desagrement ou perte 
                    de la recharge
            </label>
            <input type="text" name="montantrecharger" id="montantrecharger"  placeholder="veuillez entrer le montant de la recharge" require>
            <label style="color:yellow;" for="">
                    NB: le montant minimum pour un depot est de 2400 fcfa
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

            <input type="submit" value="Recharger">
            <br><br><br>
        </form>
    </main>
</x-app-layout>
