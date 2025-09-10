@extends('layouts.app')

@section('content')

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-6">

        <!-- Toggle Tabs -->
        <div class="flex justify-center mb-8">
            <button onclick="togglePlayers('current')" id="tab-current"
                class="px-6 py-2 bg-green-800 text-white rounded-l-full">Current Players</button>
            <button onclick="togglePlayers('past')" id="tab-past"
                class="px-6 py-2 bg-gray-200 rounded-r-full">Past Players</button>
        </div>

        <!-- Current Players -->
<div id="current-players" class="grid grid-cols-2 lg:grid-cols-8 gap-1">
    @foreach($currentPlayers as $player)
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden cursor-pointer"
             onclick="openModal({{ $player->id }})">
            <div class="relative">
                <img src="{{ asset('storage/' . $player->photo) }}" class="w-full h-40 object-cover">
                <span class="absolute top-2 left-2 bg-green-700 text-white px-3 py-1 rounded-full font-bold">
                    #{{ $player->jersey_number }}
                </span>
            </div>
            <div class="p-5 text-center">
                <h3 class="text-lg font-bold">{{ $player->name }}</h3>
                <p class="text-sm text-gray-600">{{ $player->position }}</p>
                <p class="text-xs text-gray-500">{{ $player->age }}yrs | {{ $player->height }}cm | {{ $player->weight }}kg</p>
            </div>
        </div>
    @endforeach
</div>

<!-- Past Players -->
<div id="past-players" class="grid grid-cols-2 lg:grid-cols-8 gap-1 hidden">
    @foreach($pastPlayers as $player)
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden cursor-pointer"
             onclick="openModal({{ $player->id }})">
            <div class="relative">
                <img src="{{ asset('storage/' . $player->photo) }}" class="w-full h-40 object-cover">
                <span class="absolute top-2 left-2 bg-gray-700 text-white px-3 py-1 rounded-full font-bold">
                    #{{ $player->jersey_number }}
                </span>
            </div>
            <div class="p-5 text-center">
                <h3 class="text-lg font-bold">{{ $player->name }}</h3>
                <p class="text-sm text-gray-600">{{ $player->position }}</p>
                <p class="text-xs text-gray-500">{{ $player->age }}yrs | {{ $player->height }}cm | {{ $player->weight }}kg</p>
            </div>
        </div>
    @endforeach
</div>

<!-- Officials -->
<div class="mt-16">
    <h2 class="text-2xl font-bold text-green-800 mb-6 text-center">Team Officials</h2>
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-1">
        @foreach($officials as $official)
            <div class="bg-white rounded-xl shadow p-5 text-center">
                <img src="{{ asset('storage/' . $official->photo) }}" class="w-28 h-28 rounded-full mx-auto mb-4 object-cover">
                <h3 class="font-bold">{{ $official->name }}</h3>
                <p class="text-sm text-gray-600">{{ $official->role }}</p>
            </div>
        @endforeach
    </div>
</div>

    </div>
</section>

<!-- Modal -->
<div id="playerModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-xl shadow-xl w-11/12 sm:w-3/4 md:w-full max-w-lg p-4 md:p-6 relative">

        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600">&times;</button>
        <div id="modalContent">
            <!-- Fetched dynamically -->
        </div>
    </div>
</div>

<script>
    function togglePlayers(type) {
        document.getElementById('current-players').classList.toggle('hidden', type !== 'current');
        document.getElementById('past-players').classList.toggle('hidden', type !== 'past');
        document.getElementById('tab-current').classList.toggle('bg-green-800', type === 'current');
        document.getElementById('tab-current').classList.toggle('bg-gray-200', type !== 'current');
        document.getElementById('tab-past').classList.toggle('bg-green-800', type === 'past');
        document.getElementById('tab-past').classList.toggle('bg-gray-200', type !== 'past');
    }

    function openModal(playerId) {
        fetch(`/players/${playerId}`)
            .then(res => res.text())
            .then(html => {
                document.getElementById('modalContent').innerHTML = html;
                document.getElementById('playerModal').classList.remove('hidden');
            });
    }

    function closeModal() {
        document.getElementById('playerModal').classList.add('hidden');
    }
</script>
@endsection
