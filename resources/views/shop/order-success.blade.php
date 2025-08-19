@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-2xl text-center">
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <p class="text-lg mb-4">We’re redirecting you to WhatsApp so you can confirm your order with Olive Rugby.</p>

    <a href="{{ $whatsappUrl }}" target="_blank" 
       class="inline-block bg-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600 transition">
        Open WhatsApp
    </a>
</div>

<script>
    // Auto open WhatsApp in a new tab after 1 second
    setTimeout(() => {
        window.open("{{ $whatsappUrl }}", "_blank");
    }, 1000);
</script>
@endsection
