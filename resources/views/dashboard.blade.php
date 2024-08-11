<x-app-layout>
<div class="top">
            <div class="profil">
                <img src="{{ Storage::url('assets/img/téléchargement (2).png') }}" alt="">
            </div>
            <div class="logo">
                <img src="{{ Storage::url('assets/img/index-logo-aliexpress.d983a6f2.png') }}" alt="">
            </div>
        </div>
        <div class="home_img">
            <img src="{{ Storage::url('assets/img/index-b-aliexpress.c12123d1.png') }}" alt="">
        </div>

        <div class="main">
            <div class="tools">
                <div class="tool">
                   
                        <img src="{{ Storage::url('assets/img/item1.04baf29d.png') }}" alt="">
                        <!-- Bouton pour ouvrir le popup -->
                        <span style="font-size:14pt;" class="openModalBtn" data-modal-id="myModal00000">
                                Inviter
                        </span>
                        <!-- Le popup -->
                        <div id="myModal00000" class="modal">
                            <!-- Contenu du popup -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <h2 style="color:black;">Vos Informations De Parrainage</h2>
                                <h4 style="color:black;">lien du site: {{ url('/') }}/{{Auth::user()->referral_code}}</h4>
                                <h4 style="color:black;">votre code de parrainage est: {{Auth::user()->referral_code}}</h4>
                            </div>
                        </div>
                   
                </div>
                <div class="tool">
                    <img src="{{ Storage::url('assets/img/item2.97874ce5.png') }}" alt="">
                    <a href="/recharger" style="color:white"> Recharger </a>
                </div>
                <div class="tool">
                    <img src="{{ Storage::url('assets/img/item2.97874ce5.png') }}" alt="">
                    <a href="/retrait" style="color:white"> Retrait </a>
                </div>

                <div class="tool">
                    <img src="{{ Storage::url('assets/img/item4.175852c2.png') }}" alt="">
                    <!-- Bouton pour ouvrir le popup -->
                    <span style="font-size:14pt;" class="openModalBtn" data-modal-id="myModal000000">
                                Partager
                    </span>
                    <!-- Le popup -->
                    <div id="myModal000000" class="modal">
                            <!-- Contenu du popup -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <h2 style="color:black;">Partager sur</h2>
                                <p>
                                    <a href="https://api.whatsapp.com/send?text={{ url('/') }}/register/{{Auth::user()->referral_code}}" target="_blank">
                                        <img style="width:150px;height:100px;" src="{{ Storage::url('assets/img/WhatsApp-Logo.wine.png') }}" alt="">
                                    </a>
                                </p>
                                <p>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/') }}/register/{{Auth::user()->referral_code}}" target="_blank">
                                        <img style="width:150px;height:100px;" src="{{ Storage::url('assets/img/Facebook-f_Logo-Blue-Logo.wine.svg') }}" alt="">
                                    </a>
                                </p>
                                <p>
                                    <a href="https://t.me/share/url?url={{ url('/') }}/register/{{Auth::user()->referral_code}}" target="_blank">
                                        <img style="width:100px;height:80px;" src="{{ Storage::url('assets/img/telegram-2019-logo.svg') }}" alt="">
                                    </a>
                                </p>
                                
   
                            </div>
                    </div>
                </div>
               
            </div>
            <div class="nouvelles">
                <p>Mes transactions</p>
                @php
                    // Récupérer l'utilisateur authentifié
                    $user = Auth::user();
                @endphp
                @forelse($user->transactions as $index => $transaction)
                    <div class="meijindo">
                        <span>{{ $transaction->type_transact }} de {{ number_format($transaction->montant_transact, 0, ',', ' ') }} FCFA</span>
                        <span style="color:yellow;">{{ $transaction->state_transact }}</span>

                        <!-- Bouton pour ouvrir le popup -->
                        <button class="openModalBtn" data-modal-id="myModal{{ $index }}"  style="padding:4px 10px;border:none;border-radius:5px;background:blue;color:white;text-decoration:none;">
                            Voir
                        </button>
                    </div>
                    <br>

                    <!-- Le popup -->
                    <div id="myModal{{ $index }}" class="modal">
                        <!-- Contenu du popup -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h2>{{ $transaction->type_transact }} </h2>
                            <p>Montant : {{ $transaction->montant_transact }} fcfa</p>
                            <p>status : {{ $transaction->state_transact }}</p>
                            <p>Date / Heure : {{ $transaction->created_at }}</p>
                            <p>Moyen Payement : {{ $transaction->moyen_payement }}</p>
                            
                        </div>
                    </div>
                @empty
                        <center>
                            <span style="font-size:14pt;color:white;">Aucune transaction</span>
                        </center>
                @endforelse
                
                
            <br><br><br><br><br>   
            </div>
            

        </div>




        
            
    

                
</x-app-layout>
