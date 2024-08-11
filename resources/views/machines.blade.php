<x-app-layout>

<div class="main">
    <div class="meijindos" >

        <br>
        @forelse($machines as $machine)
        @php
            $m = ($machine->montant_mach * $machine->pourcentage) / 100;
            $g = $m * $machine->nbr_jour;
    
        @endphp
        <div class="finance-card">
            <div class="front">
                <div class="image">
                    <img src="{{ Storage::url('assets/img/chip.png') }}" alt="">
                    <img src="{{ Storage::url('assets/img/login-logo-aliexpress.b04df2eb.png') }}" alt="">
                </div>
                <div class="card-number-box">
                
                    <center>
                        @if(in_array($machine->id, $userMachines))
                            <p style="color: white; font-size: 14pt;">Vous possédez déjà cette machine</p>
                        @elseif(Auth::user()->wallet < $machine->montant_mach)
                            <p style="color: white; font-size: 14pt;">Votre Solde est insuffisant pour acheter ce VIP</p>
                        @else    
                            <a href="/investissementcreate/{{ $machine->id }}" style="padding:7px 14px;background:orange;border-radius:5px;text-decoration:none;font-size:14pt;color:white;border:none;cursor:pointer;">acheter</a>
                        @endif
                    </center>
            
                </div>
                <div class="flexbox">
                    <div class="box">
                        <span>Montant: {{$machine->montant_mach}} fcfa</span>
                        <div class="card-holder-name">Prime Jour: {{$machine->pourcentage}}%</div>
                    </div>
                 
                    <div class="box">
                        <span>Jour Total:{{$machine->nbr_jour}} jours</span>
                        <div class="expiration">
                            <span class="exp-month">Gain Total:{{ $g }} fcfa</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @empty

        @endforelse
        
    <br><br><br><br><br><br>
    </div>
</div>




</x-app-layout>
