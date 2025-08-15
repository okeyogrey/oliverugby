@extends('layouts.app')

@section('content')
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-center mb-8">Gallery</h1>

        <!-- Filter buttons (optional) -->
        <div class="flex justify-center gap-4 mb-8">
            <button class="px-4 py-2 bg-green-800 text-white rounded hover:bg-green-700">All</button>
            <button class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Matches</button>
            <button class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Trainings</button>
        </div>

        <!-- Image Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($images as $image)
                <div class="group relative overflow-hidden rounded shadow hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}"
                         class="w-full h-64 object-cover transform group-hover:scale-105 transition duration-300 cursor-pointer"
                         onclick="openLightbox('{{ asset('storage/' . $image->image_path) }}')">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                        <p class="text-white font-semibold">{{ $image->title }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Lightbox -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center hidden z-50">
    <span class="absolute top-6 right-6 text-white text-3xl cursor-pointer" onclick="closeLightbox()">&times;</span>
    <img id="lightboxImage" class="max-h-[90%] max-w-[90%] rounded shadow-lg">
</div>

<script>
function openLightbox(src) {
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightboxImage').src = src;
}
function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
}
</script>
@endsection
