@extends('layouts.app')

@section('content')
<section class="py-16 bg-white">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="bg-gray-50 p-6 rounded-lg shadow">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                <img src="{{ asset('storage/' . $player->photo) }}" class="w-48 h-48 object-cover rounded-full shadow">
                <div>
                    <h1 class="text-3xl font-bold text-green-800">{{ $player->name }}</h1>
                    <p class="text-gray-600">{{ $player->position }}</p>
                    <p class="mt-4">{{ $player->bio }}</p>
                </div>
            </div>

            <div class="grid grid-cols-3 text-center mt-8">
                <div>
                    <p class="text-2xl font-bold">{{ $player->games_played }}</p>
                    <p class="text-sm text-gray-600">Games</p>
                </div>
                <div>
                    <p class="text-2xl font-bold">{{ $player->tries_scored }}</p>
                    <p class="text-sm text-gray-600">Tries</p>
                </div>
                <div>
                    <p class="text-2xl font-bold">{{ $player->tackles }}</p>
                    <p class="text-sm text-gray-600">Tackles</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
