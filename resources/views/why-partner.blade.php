@extends('layouts.app')

@section('content')


@include('components.page-hero', [
    'title' => 'Why Patner With Us',
    'background' => 'images/about-banner.jpg',
    'subtitle' => 'Building a legacy on and off the pitch'
])



<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">

        <!-- Heading -->
        <div class="mb-12 text-center">
            <!-- <h1 class="text-4xl font-bold text-green-800 mb-4">Why Partner With Us</h1> -->
            <p class="text-lg text-gray-700 max-w-3xl mx-auto">
                Partnering with Olive Rugby means joining a movement to develop talent, promote sportsmanship,
                and create life-changing opportunities through rugby. Your support helps us run community programs,
                train young athletes, and host impactful events that inspire the next generation.
            </p>
        </div>

        <!-- Sponsorship Packages -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center text-green-800 mb-8">Sponsorship Packages</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach ([
                    ['tier' => 'Gold', 'price' => '$5,000+', 'color' => 'bg-yellow-500'],
                    ['tier' => 'Silver', 'price' => '$2,500+', 'color' => 'bg-gray-400'],
                    ['tier' => 'Bronze', 'price' => '$1,000+', 'color' => 'bg-orange-500']
                ] as $package)
                <div class="relative rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <div class="{{ $package['color'] }} text-white text-center p-6">
                        <h3 class="text-2xl font-bold">{{ $package['tier'] }} Sponsor</h3>
                        <p class="mt-2 font-semibold">{{ $package['price'] }}</p>
                    </div>
                    <div class="bg-white p-6 text-gray-700">
                        <ul class="list-disc list-inside space-y-2">
                            <li>Logo on team jerseys</li>
                            <li>Social media shoutouts</li>
                            <li>VIP seating at matches</li>
                            <li>Brand visibility at events</li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Brand Benefits -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center text-green-800 mb-8">Brand Benefits</h2>
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div>
                    <i class="fas fa-bullhorn text-4xl text-green-800 mb-4"></i>
                    <h4 class="font-bold">Increased Exposure</h4>
                    <p class="text-gray-600 text-sm">Reach thousands of fans locally and nationally.</p>
                </div>
                <div>
                    <i class="fas fa-users text-4xl text-green-800 mb-4"></i>
                    <h4 class="font-bold">Community Impact</h4>
                    <p class="text-gray-600 text-sm">Showcase your commitment to youth and sports development.</p>
                </div>
                <div>
                    <i class="fas fa-handshake text-4xl text-green-800 mb-4"></i>
                    <h4 class="font-bold">Partnership Growth</h4>
                    <p class="text-gray-600 text-sm">Build lasting relationships with our community and partners.</p>
                </div>
                <div>
                    <i class="fas fa-trophy text-4xl text-green-800 mb-4"></i>
                    <h4 class="font-bold">Prestige</h4>
                    <p class="text-gray-600 text-sm">Associate your brand with sporting excellence.</p>
                </div>
            </div>
        </div>

        <!-- CTA Form -->
        <div class="bg-green-800 text-white rounded-lg p-8 shadow-lg max-w-2xl mx-auto" data-aos="fade-up">
            <h2 class="text-2xl font-bold mb-4">Request a Sponsorship Kit</h2>
            <p class="mb-6">Fill out the form below to receive our sponsorship proposal and package details.</p>
            <form action="{{ route('sponsor.request') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="Your Name" class="w-full p-3 rounded text-gray-900" required>
                <input type="email" name="email" placeholder="Your Email" class="w-full p-3 rounded text-gray-900" required>
                <input type="text" name="company" placeholder="Company Name" class="w-full p-3 rounded text-gray-900">
                <textarea name="message" rows="4" placeholder="Your Message" class="w-full p-3 rounded text-gray-900"></textarea>
                <button type="submit" class="bg-yellow-500 text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-400 transition">
                    Send Request
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
