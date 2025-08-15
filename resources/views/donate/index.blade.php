@extends('layouts.app')

@section('content')
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Support Olive Rugby</h1>
        <p class="text-center max-w-2xl mx-auto mb-8 text-gray-700">
            Your donations help us train young players, host community events, and keep the spirit of rugby alive.
        </p>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Cause 1 -->
            <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold mb-4">Youth Training Program</h2>
                <p class="text-gray-600 mb-4">Help us equip our youth teams with kits, balls, and training facilities.</p>
                <a href="#" class="bg-green-800 text-white px-4 py-2 rounded hover:bg-green-700">Donate</a>
            </div>

            <!-- Cause 2 -->
            <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold mb-4">Community Outreach</h2>
                <p class="text-gray-600 mb-4">Support our community rugby clinics and mentorship sessions.</p>
                <a href="#" class="bg-green-800 text-white px-4 py-2 rounded hover:bg-green-700">Donate</a>
            </div>

            <!-- Cause 3 -->
            <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold mb-4">Stadium Upgrades</h2>
                <p class="text-gray-600 mb-4">Help us renovate our home ground for better matches and events.</p>
                <a href="#" class="bg-green-800 text-white px-4 py-2 rounded hover:bg-green-700">Donate</a>
            </div>
        </div>
    </div>
</section>
@endsection
