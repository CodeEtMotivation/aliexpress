<x-app-layout>
    <center>
        <h4 style="font-size:14pt; color:white;">Listes De Mes Parraines</h4>
    </center>   

    <div class="main">
        <section class="table__body">
            <table border="5">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Numero</th>
                        <th>Premiere VIP</th>
                        <th>Prime Actuelle De Ce VIP</th>
                        <th>Mon Pourcentage (15%)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($parraines as $parraine)
                        @php
                            $user = App\Models\User::find($parraine->parraine_id);
                            $machine = $user ? $user->machines()->first() : null;
                            $table_parrainage = App\Models\Parrainage::find($parraine->id);
                        @endphp

                        @if($user && $machine)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->tel }}</td>
                                <td>{{ $machine->montant_mach }}</td>
                                <td>{{ $machine->pivot->current_amount }}</td>
                                <td>{{ ($machine->montant_mach * 15)/100 }}</td>
                                @if($machine->pivot->current_amount > ($machine->montant_mach * 15)/100 && $table_parrainage->status == 'non recuperer')
                                    <td>
                                        <a href="/parrainageporcentage/{{ $machine->pivot->id}}/{{ ($machine->montant_mach * 15)/100 }}/{{ $user->id }}/{{$parraine->id}}" style="padding:7px 14px;background:orange;border-radius:5px;text-decoration:none;font-size:14pt;color:white;border:none;cursor:pointer;">Recuperer votre %</a>
                                    </td>
                                @else
                                    <td>
                                        <p>pas d'action pour le moment</p>
                                    </td>
                                @endif
                            </tr>
                            
                        @endif

                    @empty
                        <tr>
                            <td colspan="6">
                                <center>
                                    aucun parraine
                                </center>
                            </td>
                        </tr>  
                    @endforelse  
                </tbody>
            </table>        
        </section>
    </div>

    <center>
        <h4 style="font-size:14pt; color:white;">Notifications</h4>
    </center>  
    @php
        $notifications = App\Models\Notification::getNotificationsByUserId(Auth::user()->id);
    @endphp
    @forelse($notifications as $notification)
        <div class="bl">
            <div class="items">
                <div class="item">
                    <div>
                    <span><img src="{{ Storage::url('assets/img/itéléchargement (2).png') }}" alt=""></span>
                    <span>{{$notification->message}}</span>
                    </div>
                    <span>0</span>
                </div>
            </div>  
        </div>
    @empty
        <center>
            <h4 style="font-size:14pt; color:white;">pas de notification</h4>
        </center> 
    @endforelse    
</x-app-layout>
