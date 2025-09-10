@extends('layouts.app')

@section('content')

<!-- Hero -->
@include('components.page-hero', [
    'title' => 'Contact Us',
    'background' => 'images/about-banner.jpg',
    'subtitle' => 'Get in touch with Olive Rugby Club'
])

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12">

        <!-- Contact Form -->
        <div class="bg-white shadow rounded-xl p-8">
            <h2 class="text-lg md:text-2xl font-bold text-green-800 mb-6">Send Us a Message</h2>

            <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium mb-1">Your Name</label>
                    <input type="text" name="name" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-700" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Your Email</label>
                    <input type="email" name="email" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-700" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Message</label>
                    <textarea name="message" rows="5" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-700" required></textarea>
                </div>
                <button type="submit" class="w-full bg-green-800 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition">
                    Send Message
                </button>
            </form>
        </div>

        <!-- Contact Info + Map -->
        <div>
            <h2 class="text-lg md:text-2xl font-bold text-green-800 mb-6">Find Us</h2>
            
            <!-- Map -->
            <div class="rounded-xl overflow-hidden shadow mb-6">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.858447892548!2d36.821946!3d-1.292066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10d27e5ecff7%3A0x123456789abcdef!2sNairobi%2C%20Kenya!5e0!3m2!1sen!2ske!4v1610000000000!5m2!1sen!2ske" 
                    width="100%" 
                    height="300" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>

            <!-- Social Links -->
            <!-- <h3 class="text-lg md:text-2xl font-bold text-green-800 mb-4">Connect With Us</h3> -->
            <div class="flex space-x-4">
                <a href="https://facebook.com" target="_blank" class="text-gray-600 hover:text-green-800">
                    <i class="fab fa-facebook fa-lg md:fa-2xl"></i>
                </a>
                <a href="https://twitter.com" target="_blank" class="text-gray-600 hover:text-green-800">
                    <i class="fab fa-twitter fa-lg md:fa-2xl"></i>
                </a>
                <a href="https://instagram.com" target="_blank" class="text-gray-600 hover:text-green-800">
                    <i class="fab fa-instagram fa-lg md:fa-2xl"></i>
                </a>
                <a href="https://youtube.com" target="_blank" class="text-gray-600 hover:text-green-800">
                    <i class="fab fa-youtube fa-lg md:fa-2xl"></i>
                </a>
                <a href="https://tiktok.com" target="_blank" class="text-gray-600 hover:text-green-800">
                    <i class="fab fa-tiktok fa-lg md:fa-2xl"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection