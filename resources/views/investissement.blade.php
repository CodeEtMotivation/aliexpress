<x-app-layout>
    <div class="main">
        <div class="meijindos" id="refreshable-content">
            <br>

           
            @forelse($machines as $machine)
                <div class="finance-card">
                    <div class="front">
                        <div class="image">
                            <img src="{{ Storage::url('assets/img/chip.png') }}" alt="">
                            <img src="{{ Storage::url('assets/img/login-logo-aliexpress.b04df2eb.png') }}" alt="">
                        </div>
                        <div class="card-number-box" id="">
                            <!-- Le chiffre sera inséré ici par JavaScript -->
                            <center>
                                <h6>Prime Actuel: {{ $machine->pivot->current_amount }}</h6>
                            </center>
                        </div>
                        <div class="flexbox">
                            <div class="box">
                                <span>Montant: {{ $machine->montant_mach }}</span>
                                <div class="card-holder-name">Prime Jour: {{ $machine->pourcentage }} %</div>
                            </div>
                        
                            <div class="box">
                                <span>Jour Total: {{ $machine->nbr_jour }} jours</span>
                                <div class="expiration">
                                    <span class="exp-month">Gain Total: {{ ($machine->montant_mach*$machine->pourcentage)/100 * $machine->nbr_jour}} fcfa</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            @empty
                <p>Aucun investissement trouvé.</p>
            @endforelse
            
        <br><br><br><br><br><br>
        </div>
    </div>

    
</x-app-layout>
