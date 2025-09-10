@extends('layouts.app')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- <h2 class="text-3xl font-bold text-center mb-12">Our Merchandise</h2> -->

        <!-- Change grid cols: default=2 on mobile, md=3 on desktop -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-8">
            @foreach($products as $product)
                <div class="bg-white shadow rounded-lg p-3 md:p-4 text-center">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         class="w-full h-40 md:h-64 object-cover rounded mb-3 md:mb-4">
                    
                    <!-- Smaller text on mobile, bigger on desktop -->
                    <h3 class="font-bold text-sm md:text-lg">{{ $product->title }}</h3>
                    <p class="text-gray-600 text-xs md:text-base">{{ $product->description }}</p>
                    <p class="text-green-800 font-bold text-base md:text-xl mb-3 md:mb-4">
                        KES {{ number_format($product->price, 2) }}
                    </p>
                    
                    <a href="{{ route('shop.show', $product->id) }}" 
                       class="bg-green-700 text-white text-xs md:text-base px-3 py-1.5 md:px-4 md:py-2 rounded-lg hover:bg-green-600">
                       Buy Now
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection