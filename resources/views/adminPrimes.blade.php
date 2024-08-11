<x-app-layout>

    <div class="main">

        <br><br><br><br><br>
        <section class="table__body">
            <table border="5">
                <thead>
                    <tr>
                        <th rowspan="2">Id</th>
                        <th rowspan="2">Name</th>
                        <th rowspan="2">Numero</th>
                        <th colspan="6"><center>Machine</center></th>
                    </tr>
                    <tr>
                        <th>VIP</th>
                        <th>Jour Actuel</th>
                        <th>Jour Restant</th>
                        <th>Jour Total</th>
                        <th>Prime Actuel</th>
                        <th>Prime Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        @php $machineCount = $user->machines->count(); @endphp
                        @foreach($user->machines as $machine)
                            <tr>
                                @php
                                    

                                    // Date de création de la machine
                                    $dateCreation = \Carbon\Carbon::parse($machine->pivot->created_at)->startOfDay();

                                    // Nombre de jours total pour la machine
                                    $nbrJourTotal = $machine->nbr_jour;
                                    
                                    // Date actuelle
                                    $dateActuelle = \Carbon\Carbon::now()->startOfDay();

                                    // Calcul du jour actuel
                                     $jourActuel = $dateCreation->diffInDays($dateActuelle); // +1 pour inclure le jour de création comme jour 1
                                  
                                    // Calcul du jour restant
                                    $jourRestant = max($nbrJourTotal - $jourActuel, 0);
                                @endphp

                                @if ($loop->first)
                                    <td rowspan="{{ $machineCount }}">{{ $user->id }}</td>
                                    <td rowspan="{{ $machineCount }}">{{ $user->name }}</td>
                                    <td rowspan="{{ $machineCount }}">{{ $user->tel }}</td>
                                @endif
                                <td>{{ $machine->montant_mach}}</td>
                                <td>{{ $jourActuel }}</td>
                                <td>{{ $jourRestant }}</td>
                                <td>{{ $machine->nbr_jour }}</td>
                                <td>{{ $machine->pivot->current_amount}}</td>
                                <td>{{ (($machine->montant_mach * $machine->pourcentage)/100)*$machine->nbr_jour }}</td>
                                @if($machine->pivot->current_amount < (($machine->montant_mach * $machine->pourcentage)/100)*$machine->nbr_jour)
                                    <td>
                                        <a href="/adminPrimesIncrement/{{ $machine->pivot->id }}" style="padding:7px 14px;background:orange;border-radius:5px;text-decoration:none;font-size:14pt;color:white;border:none;cursor:pointer;">Action</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        @if ($machineCount === 0)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->tel }}</td>
                                <td colspan="6"><center>Aucune machine</center></td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="9"><center>Aucun utilisateur trouvé</center></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
        <br><br><br><br><br>
       
    </div>

</x-app-layout>
