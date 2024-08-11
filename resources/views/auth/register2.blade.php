<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="input">
            <img src="{{ Storage::url('assets/img/téléchargement (10).png') }}" alt="image numero telephone">
            <x-text-input id="nom"  type="text" name="name" :value="old('name')" placeholder="Veuillez entrer le nom" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Tel Address -->
        <div class="input">
            <img src="{{ Storage::url('assets/img/téléchargement (10).png') }}" alt="image numero telephone">
            <x-text-input id="numero_tel" type="tel" name="tel" :value="old('tel')" required min="0" maxlength="9" placeholder="Veuillez entrer le numéro de téléphone" />
            <x-input-error style="color:red;" :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <!-- code parrainage Address -->
        <div class="input">
            <img src="{{ Storage::url('assets/img/téléchargement (10).png') }}" alt="image numero telephone">
            <input id="referral_code" type="text" name="referral_code" value="{{$referral_code}}" />
        </div>

        <!-- Password -->
        <div class="input">
            <img src="{{ Storage::url('assets/img/téléchargement (11).png') }}" alt="image password">
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"  placeholder="Veuillez entrer le  mot de passe" />

            <x-input-error style="color:red;" :messages="$errors->get('password')"  />
        </div>

        <!-- Confirm Password -->
        <div class="input">
            <img src="{{ Storage::url('assets/img/téléchargement (11).png') }}" alt="image password">
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="Veuillez saisir à nouveau le  mot de passe" />

            <x-input-error style="color:red;" :messages="$errors->get('password_confirmation')"/>
        </div>

        <!-- state -->
        <div>
            <input type="hidden" name="state" value="user">
        </div>

        <input type="submit" name="submit" password="submit" value="S'inscrit">

        <p>Avez vous deja un compte? <a href="/login">Se Connecter</a></p>
    </form>

    
</x-guest-layout>
