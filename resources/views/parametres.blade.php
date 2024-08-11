<x-app-layout>
<main>
      <div class="profile">
        <div class="left">
            <img src="{{ Storage::url('assets/img/téléchargement (2).png') }}" alt="">
        </div>
        <div class="right">
            <div class="name">{{ Auth::user()->name }}</div>
            <div class="contact">{{ Auth::user()->tel }}</div>
        </div>
      </div>
      <div class="dashbord">
        <div class="equilibre">
            <span>Solde</span>
            <span>{{ Auth::user()->wallet }} fcfa</span> 
        </div>
        <div class="prime">
            <span>Prime Global</span>
            <span>{{ Auth::user()->prime }} fcfa</span>
        </div>
      </div>

      <div class="items">
        <div class="item">
            <img src="{{ Storage::url('assets/img/téléchargement (9).png') }}" alt="">
            <a href="/recharger" style="color:white"> 
                <span>Recharger</span> 
            </a>

        </div>
        <div class="item">
            <img src="{{ Storage::url('assets/img/téléchargement (8).png') }}" alt="">
            <a href="/retrait" style="color:white"> 
                <span>Retrait</span> 
            </a>

        </div>

        @if(Auth::user()->state == 'admin')
            <div class="item">
                <img src="{{ Storage::url('assets/img/téléchargement (7).png') }}" alt="">
                <div>
                    <a style="color:white;" href="/adminTransactions">les transactions</a>
                </div>

            </div>
            <div class="item">
                <img src="{{ Storage::url('assets/img/téléchargement (7).png') }}" alt="">
                <div>
                    <a style="color:white;" href="/adminPrimes">les Primes</a>
                </div>

            </div>
            <div class="item">
                <img src="{{ Storage::url('assets/img/téléchargement (7).png') }}" alt="">
                <div>
                    <a style="color:white;" href="/machinescreate">ajouter une machine</a>
                </div>

            </div>
            <div class="item">
                <img src="{{ Storage::url('assets/img/téléchargement (7).png') }}" alt="">
                <div>
                    <a style="color:white;" href="/us">les users</a>
                </div>
            </div>
        @endif

        
        <div class="item">
            <img src="{{ Storage::url('assets/img/téléchargement (5).png') }}" alt="">
            <div>A propos de nous</div>

        </div>
        <div class="quit ">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                            @csrf

                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('DECONNEXION') }}
                </x-dropdown-link>
            </form>
        </div>
      <br><br><br>
      </div>
    </main>




   
</x-app-layout>
