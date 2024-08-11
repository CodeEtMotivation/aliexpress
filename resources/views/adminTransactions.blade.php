<x-app-layout>

            

        <div class="main">
            
       
            <div class="meijindos">
                <p>les transactions clientes en attente</p>
                @foreach($transactions as $index => $transaction)
                    <div class="meijindo">
                        <span>{{ $transaction->type_transact }} de {{ $transaction->montant_transact }} fcfa</span>
                        <span style="color:green;">{{ $transaction->state_transact }}</span>

                        <!-- Bouton pour ouvrir le popup -->
                        <button class="openModalBtn" data-modal-id="myModal{{ $index }}"  style="padding:4px 10px;border:none;border-radius:5px;background:blue;color:white;text-decoration:none;">
                            Voir
                        </button>
                    </div>

                    <!-- Le popup -->
                    <div id="myModal{{ $index }}" class="modal">
                        <!-- Contenu du popup -->
                        <div class="modal-content" style="overflow-y:auto;">
                            <span class="close">&times;</span>
                            <h2>{{ $transaction->type_transact }} </h2>
                            <p>Nom Du User : {{ $transaction->user->name }}</p>
                            <p>Numero De Tel Du User : {{ $transaction->user->tel }}</p>
                            <p>Montant : {{ $transaction->montant_transact }} fcfa</p>
                            <p>status : {{ $transaction->state_transact }}</p>
                            <p>Date / Heure : {{ $transaction->created_at }}</p>
                            <p>Moyen Payement : {{ $transaction->moyen_payement }}</p>
                            
                            
                            <a href="/moyendepayementvalider/{{ $transaction->id }}" style="padding:4px 10px;border:none;border-radius:5px;background:green;color:white;text-decoration:none;">
                                Valider La transaction
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="meijindos">
                <p>les transactions clientes deja effectues</p>
                @foreach($transactions2 as $index2 => $transaction2)
                    <div class="meijindo">
                        <span>{{ $transaction2->type_transact }} de {{ $transaction2->montant_transact }} fcfa</span>
                        <span style="color:green;">{{ $transaction2->state_transact }}</span>

                        <!-- Bouton pour ouvrir le popup -->
                        <!--  button class="openModalBtn" data-modal-id="myModal{{ $index2 }}"  style="padding:4px 10px;border:none;border-radius:5px;background:blue;color:white;text-decoration:none;">
                            Voir
                        </button -->
                    </div>

                    <!-- Le popup -->
                    <div id="myModal{{ $index2 }}" class="modal">
                        <!-- Contenu du popup -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h2>{{ $transaction2->type_transact }} </h2>
                            <p>Montant : {{ $transaction2->montant_transact }} fcfa</p>
                            <p>status : {{ $transaction2->state_transact }}</p>
                            <p>Date / Heure : {{ $transaction2->created_at }}</p>
                            <p>Moyen Payement : {{ $transaction2->moyen_payement }}</p>
                            <p>Nom Du User : {{ $transaction2->user->name }}</p>
                        </div>
                    </div>
                @endforeach

            </div>




            
            
</x-app-layout>
