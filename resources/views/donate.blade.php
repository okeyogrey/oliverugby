@extends('layouts.app')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-lg">
        <h1 class="text-4xl font-bold text-center mb-6">Support Olive Rugby</h1>
        <p class="text-center text-gray-600 mb-8">
            Choose a cause you want to support and help us grow rugby in our community.
        </p>

        <form action="{{ route('donate.process') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg space-y-4">
            @csrf
            <label class="block">
                <span class="text-gray-700">Select Cause</span>
                <select name="cause" class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm">
                    @foreach($causes as $cause)
                        <option value="{{ $cause }}">{{ $cause }}</option>
                    @endforeach
                </select>
            </label>

            <label class="block">
                <span class="text-gray-700">Donation Amount (USD)</span>
                <input type="number" name="amount" min="1" step="0.01" required 
                       class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm">
            </label>

            <button type="submit" 
                    class="w-full bg-green-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                Donate Now
            </button>
        </form>
    </div>
</section>
@endsection
