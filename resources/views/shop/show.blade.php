@extends('layouts.app')

@section('content')
<section class="py-16 bg-gray-50">


    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="grid md:grid-cols-2 gap-8">
            <img src="{{ asset('storage/' . $product->image) }}" class="w-full rounded-lg shadow">

            <div>
                <h1 class="text-3xl font-bold mb-4">{{ $product->title }}</h1>
                <p class="text-gray-700 mb-4">{{ $product->description }}</p>
                <p class="text-2xl font-bold text-green-800 mb-6">KES {{ number_format($product->price, 2) }}</p>

                <h3 class="text-lg font-semibold mb-2">Pay with M-Pesa</h3>
                <p class="text-gray-600 mb-4">
                    Send payment to <span class="font-bold">M-Pesa Till: 123456</span><br>
                    After payment, fill the form below:
                </p>

                <form action="{{ route('shop.order') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    
                    <input type="text" name="customer_name" placeholder="Full Name" class="w-full border p-3 rounded">
                    <input type="text" name="phone_number" placeholder="Phone Number" class="w-full border p-3 rounded">
                    <input type="text" name="location" placeholder="Street, Town, Apartment (optional)" class="w-full border p-3 rounded">
                    <input type="text" name="mpesa_number" placeholder="M-Pesa Number Used" class="w-full border p-3 rounded">
                    <input type="text" name="mpesa_code" placeholder="M-Pesa Transaction Code" class="w-full border p-3 rounded">
                    <input type="number" name="quantity" value="1" min="1" class="w-full border p-3 rounded">

                    <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                        Submit Order
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
