<x-guest-layout>
    <form method="POST" action="/mach">
        @csrf

        <!-- montant_mach -->
        <div class="input">
            <img src="{{ Storage::url('assets/img/téléchargement (10).png') }}" alt="image numero telephone">
            <x-text-input id="montant_mach"  type="text" name="montant_mach" :value="old('montant_mach')" placeholder="Veuillez entrer le montant" required autofocus autocomplete="montant_mach" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- pourcentage -->
        <div class="input">
            <img src="{{ Storage::url('assets/img/téléchargement (10).png') }}" alt="image numero telephone">
            <x-text-input id="pourcentage" type="pourcentage" name="pourcentage" :value="old('pourcentage')" required min="0" maxlength="9" placeholder="Veuillez entrer le pourcentage" />
            <x-input-error style="color:red;" :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <!-- nbr_jour -->
        <div class="input">
            <img src="{{ Storage::url('assets/img/téléchargement (10).png') }}" alt="image numero telephone">
            <x-text-input id="nbr_jour" type="text" name="nbr_jour" :value="old('nbr_jour')"  placeholder="entrer le nombre de jour" />
        </div>
    

        <input type="submit" name="submit" password="submit" value="Creer">

    </form>

    
</x-guest-layout>
