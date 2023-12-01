<div class="flex flex-col items-center justify-center min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('/esercizio1/public/img/christmas.jpg')">
    <h1 class="text-black text-7xl md:text-8xl font-bold">Benvenuto nel Mercatino</h1>
    <div class="mt-8">
        @auth
        <a href="{{ url('/dashboard') }}" class="font-bold text-7xl md:text-8xl text-black hover:text-gray-200 focus:outline focus:outline-2 focus:outline-red-500 focus:rounded-sm py-4" wire:navigate>Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="font-bold text-7xl md:text-8xl text-black hover:text-gray-200 focus:outline focus:outline-2 focus:outline-red-500 focus:rounded-sm py-4 mb-4" wire:navigate>Log in</a>

        @if (Route::has('register'))
        <span>&</span>
        <a href="{{ route('register') }}" class="font-bold text-7xl md:text-8xl text-black hover:text-gray-200 focus:outline focus:outline-2 focus:outline-red-500 focus:rounded-sm py-4" wire:navigate>Register</a>
        @endif
        @endauth
    </div>
</div>



