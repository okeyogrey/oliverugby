<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olive Rugby</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-uH1JrHnbYhhlQ9YvW5ZjZ0Y7SYvZmL38rTuSYYVQ1OJnOq1c+PR8xKbd6ZIdr1dnDCVXwX9s0kxU9xQtKOE8JQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />


    <style>
        @keyframes popIn {
            0% { transform: scale(0.9) translateY(20px); opacity: 0; }
            60% { transform: scale(1.05) translateY(0); opacity: 1; }
            100% { transform: scale(1) translateY(0); opacity: 1; }
        }
        .pop-in {
            animation: popIn 0.8s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        }
    </style>
</head>
<body class="text-gray-900"
      x-data="{ mobileMenuOpen: false, scrolled: false }" 
      x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 50)">
    
    <!-- Navbar -->
<header :class="scrolled ? 'bg-black py-2 shadow-lg' : 'bg-black py-4 shadow-md'" 
        class="text-white sticky top-0 z-50 transition-all duration-300" 
        data-aos="fade-down">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <h1 class="text-xl font-bold" data-aos="fade-right" data-aos-delay="200">
            Olive Rugby
        </h1>

        <!-- Desktop Menu -->
<nav class="hidden md:flex items-center space-x-4" data-aos="fade-left" data-aos-delay="200">
    <a href="{{ route('home') }}" 
       class="relative px-3 hover:text-gray-300 transition group">
        Home
        <span class="absolute left-0 bottom-0 w-full h-0.5 bg-yellow-400 scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
    </a>

    <!-- About Us Dropdown -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open"
                class="relative px-3 hover:text-gray-300 transition flex items-center group">
            About Us
            <span class="absolute left-0 bottom-0 w-full h-0.5 bg-yellow-400 scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
        </button>

        <div x-show="open" @click.away="open = false" 
             x-transition 
             class="absolute left-0 mt-2 w-48 bg-white text-gray-800 rounded-md shadow-lg z-50">
            <a href="{{ route('about') }}" class="block px-4 py-2 hover:bg-gray-100">Who We Are</a>
            <a href="{{ route('events.index') }}" class="block px-4 py-2 hover:bg-gray-100">Events</a>
            <a href="{{ route('gallery') }}" class="block px-4 py-2 hover:bg-gray-100">Gallery</a>
            <a href="{{ route('why-partner') }}" class="block px-4 py-2 hover:bg-gray-100">Why Partner With Us</a>
        </div>
    </div>

    <a href="{{ route('posts.index') }}" 
       class="relative px-3 hover:text-gray-300 transition group">
        News
        <span class="absolute left-0 bottom-0 w-full h-0.5 bg-yellow-400 scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
    </a>

    <a href="{{ route('players.index') }}" 
       class="relative px-3 hover:text-gray-300 transition group">
        Team
        <span class="absolute left-0 bottom-0 w-full h-0.5 bg-yellow-400 scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
    </a>

    <a href="{{ route('contact') }}"
       class="relative px-3 hover:text-gray-300 transition group">
        Contact
        <span class="absolute left-0 bottom-0 w-full h-0.5 bg-yellow-400 scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
    </a>

    <a href="{{ route('shop.index') }}" 
       class="border border-yellow-500 text-yellow-400 px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 hover:text-black transition">
       <i class="fa-solid fa-cart-shopping"></i> Shop
    </a>

    <a href="{{ route('donate') }}" 
       class="bg-yellow-500 text-black px-4 py-2 rounded-lg font-semibold hover:bg-yellow-400 transition">
        Donate
    </a>
</nav>



        <!-- Mobile Hamburger -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden focus:outline-none">
            <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" 
                 class="h-6 w-6" fill="none" viewBox="0 0 24 24" 
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" 
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" 
                 class="h-6 w-6" fill="none" viewBox="0 0 24 24" 
                 stroke="currentColor" stroke-width="2" x-cloak>
                <path stroke-linecap="round" stroke-linejoin="round" 
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
<div x-show="mobileMenuOpen" x-transition class="md:hidden bg-black">
    <nav class="flex flex-col p-4 space-y-2">
        <a href="{{ route('home') }}" class="block hover:text-gray-300 transition">Home</a>

        <!-- About Us with sublinks -->
        <div x-data="{ subOpen: false }">
            <button @click="subOpen = !subOpen" class="w-full text-left hover:text-gray-300 transition flex justify-between items-center">
                About Us
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="subOpen" x-transition class="ml-4 mt-2 space-y-1">
                <a href="{{ route('about') }}" class="block hover:text-gray-300 transition">Who We Are</a>
                <a href="{{ route('events.index') }}" class="block hover:text-gray-300 transition">Events</a>
                <a href="{{ route('gallery') }}" class="block hover:text-gray-300 transition">Gallery</a>
                <a href="{{ route('why-partner') }}" class="block hover:text-gray-300 transition">Why Partner With Us</a>
            </div>
        </div>

        <a href="{{ route('gallery') }}" class="hover:text-green-600">Gallery</a>
        <a href="{{ route('posts.index') }}" class="block hover:text-gray-300 transition">News</a>
        <a href="{{ route('players.index') }}" class="block hover:text-gray-300 transition">Team</a>
        <a href="{{ route('contact') }}" class="block hover:text-gray-300 transition">Contact</a>
        <a href="{{ route('shop.index') }}" 
           class="border border-yellow-500 text-yellow-400 px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 hover:text-black transition text-center">
           <i class="fa-solid fa-cart-shopping"></i> Shop
           
        </a>
        <a href="{{ route('donate') }}" 
           class="bg-yellow-500 text-black px-4 py-2 rounded-lg font-semibold hover:bg-yellow-400 transition text-center">
            Donate
        </a>
    </nav>
</div>

</header>


    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-4" data-aos="fade-up">
        &copy; {{ date('Y') }} Olive Rugby. All rights reserved.
    </footer>
</body>
</html>
