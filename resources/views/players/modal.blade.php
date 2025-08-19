<div class="text-center">
    <!-- Player Photo -->
    <img src="{{ asset('storage/' . $player->photo) }}" 
         alt="{{ $player->name }}" 
         class="w-32 h-32 mx-auto rounded-full object-cover mb-4 border-4 border-green-700">

    <!-- Name & Jersey -->
    <h2 class="text-2xl font-bold text-green-800 mb-1">
        {{ $player->name }}
    </h2>
    <p class="text-sm text-gray-600 mb-2">
        Jersey #{{ $player->jersey_number }} • {{ $player->position }}
    </p>

    <!-- Quick Stats -->
    <div class="grid grid-cols-3 gap-4 my-4 text-sm">
        <div class="bg-gray-50 p-2 rounded">
            <p class="font-bold">{{ $player->age }}</p>
            <p class="text-gray-500">Age</p>
        </div>
        <div class="bg-gray-50 p-2 rounded">
            <p class="font-bold">{{ $player->height }} cm</p>
            <p class="text-gray-500">Height</p>
        </div>
        <div class="bg-gray-50 p-2 rounded">
            <p class="font-bold">{{ $player->weight }} kg</p>
            <p class="text-gray-500">Weight</p>
        </div>
    </div>

    <!-- Extended Stats -->
    <div class="grid grid-cols-3 gap-4 my-4 text-sm">
        <div class="bg-green-50 p-2 rounded">
            <p class="font-bold">{{ $player->games_played }}</p>
            <p class="text-gray-500">Matches</p>
        </div>
        <div class="bg-green-50 p-2 rounded">
            <p class="font-bold">{{ $player->tries_scored }}</p>
            <p class="text-gray-500">Tries</p>
        </div>
        <div class="bg-green-50 p-2 rounded">
            <p class="font-bold">{{ $player->tackles }}</p>
            <p class="text-gray-500">Tackles</p>
        </div>
    </div>

    <!-- Bio -->
    <p class="text-gray-700 mb-4">
        {{ $player->bio }}
    </p>

    <!-- Socials -->
    @if($player->instagram)
        <a href="{{ $player->instagram }}" target="_blank" 
           class="inline-flex items-center text-pink-600 font-semibold hover:underline">
            <i class="fab fa-instagram mr-1"></i> Instagram
        </a>
    @endif
</div>
