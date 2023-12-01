<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-center font-bold text-red-600 italic my-8" style="font-size: 30px;">
                    <h1>{{ __("Benvenuto nel pannello amministratore") }}</h1>
                    <p>{{ __("crea un nuovo cliente ed associali un oggetto") }}</p>
                </div>
            </div>
        </div>
    </div>

    @livewire('gestione-clienti')

</x-app-layout>
