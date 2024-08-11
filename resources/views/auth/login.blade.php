<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Tel Address -->
        <div class="input">
            <img src="{{ Storage::url('assets/img/téléchargement (10).png') }}" alt="image numero telephone">
            <x-input-label for="tel" :value="__('tel')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="tel" name="tel" :value="old('tel')"  />
            <x-input-error style="color:red;" :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="input">
            <img src="{{ Storage::url('assets/img/téléchargement (11).png') }}" alt="image numero telephone">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error style="color:red;" :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span style="font-size:25px;color:white;">{{ __('Remember me') }}</span>
            </label>
        </div>
        <input type="submit" name="submit" password="submit" value="Se connecter">

        <p>Etes vous un nouveau membre? <a href="/register">Registre</a></p>
        
    </form>

</x-guest-layout>
