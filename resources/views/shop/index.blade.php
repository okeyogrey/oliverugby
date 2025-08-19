@extends('layouts.app')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <h2 class="text-3xl font-bold text-center mb-12">Our Merchandise</h2>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($products as $product)
                <div class="bg-white shadow rounded-lg p-4 text-center">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         class="w-full h-64 object-cover rounded mb-4">
                    <h3 class="font-bold text-lg">{{ $product->title }}</h3>
                    <p class="text-gray-600">{{ $product->description }}</p>
                    <p class="text-green-800 font-bold text-xl mb-4">KES {{ number_format($product->price, 2) }}</p>
                    <a href="{{ route('shop.show', $product->id) }}" 
                       class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                       Buy Now
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
