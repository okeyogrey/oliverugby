<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olive Rugby</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Pop-in animation */
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
<body class="bg-gray-50 text-gray-900" 
      x-data="{ mobileMenuOpen: false, scrolled: false, heroScroll: 0 }" 
      x-init="
        window.addEventListener('scroll', () => { 
            scrolled = window.scrollY > 50;
            heroScroll = window.scrollY;
        });
      ">

    <!-- Navbar -->
    <header 
        :class="scrolled ? 'bg-green-900 py-2 shadow-lg' : 'bg-green-800 py-4 shadow-md'" 
        class="text-white sticky top-0 z-50 transition-all duration-300" 
        data-aos="fade-down">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <h1 class="text-xl font-bold" data-aos="fade-right" data-aos-delay="200">
                Olive Rugby
            </h1>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex space-x-4" data-aos="fade-left" data-aos-delay="200">
                <a href="/" class="px-3 hover:text-gray-300 transition">Home</a>
                <a href="/events" class="px-3 hover:text-gray-300 transition">Events</a>
                <a href="/news" class="px-3 hover:text-gray-300 transition">News</a>
                <a href="#contact" class="px-3 hover:text-gray-300 transition">Contact</a>
            </nav>

            <!-- Mobile Hamburger -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden focus:outline-none">
                <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-green-700">
            <nav class="flex flex-col p-4 space-y-2">
                <a href="/" class="block hover:text-gray-300 transition">Home</a>
                <a href="/events" class="block hover:text-gray-300 transition">Events</a>
                <a href="/news" class="block hover:text-gray-300 transition">News</a>
                <a href="#contact" class="block hover:text-gray-300 transition">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section (Parallax + Elastic Zoom + Pop-In Text) -->
    <div class="relative overflow-hidden h-[70vh] md:h-[85vh]">
        <div class="absolute inset-0 bg-center bg-cover" 
             style="background-image: url('/images/hero-bg.jpg'); will-change: transform, background-position;"
             :style="`background-position-y: ${heroScroll * 0.4}px; transform: scale(${1 + heroScroll / 3000}); transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);`">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative z-10 flex flex-col items-center justify-center text-center h-full text-white"
             :style="`opacity: ${1 - heroScroll / 300}; transform: translateY(${heroScroll / 5}px); transition: opacity 0.3s ease-out, transform 0.3s ease-out;`"
             data-aos="fade-up">
            <h1 class="text-4xl md:text-6xl font-bold mb-4 pop-in">Olive Rugby</h1>
            <p class="text-lg md:text-xl mb-6 pop-in" style="animation-delay: 0.2s;">Legacy In Every Tackle</p>
            <a href="{{ route('games.index') }}" 
               class="bg-white text-green-800 px-6 py-3 rounded-full font-semibold hover:bg-gray-200 transition pop-in" 
               style="animation-delay: 0.4s;">
               View Fixtures
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto py-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-green-800 text-white text-center py-4" data-aos="fade-up">
        &copy; {{ date('Y') }} Olive Rugby. All rights reserved.
    </footer>
</body>
</html>
