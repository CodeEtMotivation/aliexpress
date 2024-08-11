<x-app-layout>
    <center>
        <h4 style="font-size:14pt; color:white;">Listes Des users</h4>
    </center>   

    <div class="main">
        <section class="table__body">
            <table border="5">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Numero</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $users = App\Models\User::all();
                    @endphp
                    @forelse($users as $user)
                        

                        
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->tel }}</td>
                                <td>{{ $user->state }}</td>
                                @if($user->state == "user")
                                    <td>
                                        <a href="/us/{{$user->id}}" style="padding:7px 14px;background:orange;border-radius:5px;text-decoration:none;font-size:14pt;color:white;border:none;cursor:pointer;">Nommer Admin</a>
                                    </td>
                                @else
                                    <td>
                                        <p>no found</p>
                                    </td>
                                @endif    
                            </tr>
                            
                       

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

   
</x-app-layout>
