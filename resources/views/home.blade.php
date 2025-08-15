@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div class="relative overflow-hidden h-[70vh] md:h-[85vh]" 
     x-data="{ 
         heroScroll: 0,
         currentIndex: 0,
         images: [
             '{{ asset('images/hero.png') }}',
             '{{ asset('images/hero2.png') }}',
             '{{ asset('images/hero3.png') }}'
         ],
         titles: [
             'Olive Rugby',
             'Home Of The Champs',
             'Legacy In Every Tackle'
         ],
         subtitles: [
             'Legacy In Every Tackle',
             'Fostering Talent & Discipline',
             'Inspiring Youth & Empowering Communities'
         ],
         startSlider() {
             setInterval(() => {
                 this.nextSlide();
             }, 5000);
         },
         nextSlide() {
             this.fadeOutText(() => {
                 this.currentIndex = (this.currentIndex + 1) % this.images.length;
                 this.fadeInText();
             });
         },
         prevSlide() {
             this.fadeOutText(() => {
                 this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
                 this.fadeInText();
             });
         },
         goToSlide(index) {
             this.fadeOutText(() => {
                 this.currentIndex = index;
                 this.fadeInText();
             });
         },
         fadeOutText(callback) {
             const textBox = this.$refs.textContent;
             textBox.classList.add('opacity-0', 'translate-y-6');
             setTimeout(() => {
                 callback();
             }, 500);
         },
         fadeInText() {
             const textBox = this.$refs.textContent;
             setTimeout(() => {
                 textBox.classList.remove('opacity-0', 'translate-y-6');
             }, 50);
         },
         handleSwipe() {
             let startX = 0;
             let endX = 0;

             this.$el.addEventListener('touchstart', e => {
                 startX = e.touches[0].clientX;
             });

             this.$el.addEventListener('touchend', e => {
                 endX = e.changedTouches[0].clientX;
                 let diff = startX - endX;

                 if (Math.abs(diff) > 50) {
                     if (diff > 0) {
                         this.nextSlide();
                     } else {
                         this.prevSlide();
                     }
                 }
             });
         }
     }" 
     x-init="
         window.addEventListener('scroll', () => heroScroll = window.scrollY);
         startSlider();
         handleSwipe();
     ">

    <!-- Slider container -->
    <div class="absolute inset-0 flex transition-transform duration-1000 ease-in-out"
         :style="`transform: translateX(-${currentIndex * 100}%);`">
        
        <template x-for="image in images" :key="image">
            <div class="flex-shrink-0 w-full h-full bg-center bg-cover"
                 :style="`background-image: url('${image}'); background-position-y: ${heroScroll * 0.4}px; transform: scale(${1 + heroScroll / 3000});`">
            </div>
        </template>
    </div>

    <!-- Text content with cinematic fade -->
    <div class="relative z-10 flex flex-col items-center justify-center text-center h-full text-white transition-all duration-500 ease-out"
         :style="`opacity: ${1 - heroScroll / 300}; transform: translateY(${heroScroll / 5}px);`"
         x-ref="textContent"
         data-aos="fade-up">
        <h1 class="text-4xl md:text-6xl font-bold mb-4" x-text="titles[currentIndex]"></h1>
        <p class="text-lg md:text-xl mb-6" x-text="subtitles[currentIndex]"></p>
        <a href="{{ route('games.index') }}" 
           class="bg-white text-green-800 px-6 py-3 rounded-full font-semibold hover:bg-gray-200 transition" 
           style="animation-delay: 0.4s;">
           View Fixtures
        </a>
    </div>

    <!-- Navigation dots -->
    <div class="absolute bottom-6 left-0 right-0 flex justify-center space-x-3 z-20">
        <template x-for="(image, index) in images" :key="index">
            <button @click="goToSlide(index)" 
                    :class="currentIndex === index ? 'bg-white' : 'bg-white/50'" 
                    class="w-3 h-3 rounded-full transition-colors duration-300"></button>
        </template>
    </div>
</div>


<!-- About Us Section -->
<section class="py-16 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
        <div class="md:w-1/2">
            <img src="{{ asset('images/rugby.jpg') }}" alt="About Olive Rugby" class="rounded-lg shadow-lg">
        </div>
        <div class="md:w-1/2">
            <h2 class="text-3xl font-bold mb-6 text-center">About Us</h2>
            <p class="text-gray-700 mb-6">
                Olive Rugby is dedicated to fostering talent, teamwork, and discipline through the game of rugby.
                We aim to inspire youth, empower communities, and build a lasting legacy on and off the field.
            </p>
            <a href="{{ route('about') }}" 
               class="inline-block bg-green-800 text-white px-6 py-3 rounded-lg shadow hover:bg-green-700 transition">
                Read More →
            </a>
        </div>
    </div>
</section>



<!-- Impact Highlights Section -->
<section class="py-12 bg-gray-50" data-aos="fade-up" 
         x-data="counterSection" 
         x-init="startCounting()">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-6 text-center">
            
            <!-- Card 1 -->
            <div class="bg-white p-8 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-4xl font-bold text-green-800 mb-2" x-text="players + '+'"></h3>
                <p class="text-gray-700">Players Trained</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-8 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-4xl font-bold text-green-800 mb-2" x-text="events + '+'"></h3>
                <p class="text-gray-700">Community Events</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-8 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-4xl font-bold text-green-800 mb-2" x-text="years + '+'"></h3>
                <p class="text-gray-700">Years of Impact</p>
            </div>

        </div>
    </div>
</section>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('counterSection', () => ({
        players: 0,
        events: 0,
        years: 0,
        startCounting() {
            this.animateValue('players', 50, 3500);
            this.animateValue('events', 20, 3500);
            this.animateValue('years', 2, 1500);
        },
        animateValue(key, target, duration) {
            let start = 0;
            let startTime = null;
            const easeOutQuad = t => t * (2 - t);

            const step = (timestamp) => {
                if (!startTime) startTime = timestamp;
                let progress = Math.min((timestamp - startTime) / duration, 1);
                let easedProgress = easeOutQuad(progress);
                this[key] = Math.floor(start + (target - start) * easedProgress);
                if (progress < 1) {
                    requestAnimationFrame(step);
                }
            };
            requestAnimationFrame(step);
        }
    }))
});
</script>




<!-- Upcoming Events -->
<section class="py-12" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-6 text-center">Upcoming Events</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($upcomingEvents as $event)
                <div class="bg-white shadow rounded p-4 hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    @if($event->banner)
                        <img src="{{ asset('storage/' . $event->banner) }}" class="w-full h-40 object-cover rounded mb-4">
                    @endif
                    <h3 class="font-bold mb-2">{{ $event->title }}</h3>
                    <p class="text-sm text-gray-600">{{ $event->start_at->format('M d, Y H:i') }}</p>
                    <a href="{{ route('events.index') }}" class="text-green-800 font-semibold">View Details →</a>
                </div>
            @endforeach
        </div>
    </div>
</section>



<!-- Sponsors Carousel -->
<section class="py-12 bg-white relative" data-aos="fade-up">
    <div class="px-4">
        <h2 class="text-3xl font-bold mb-6 text-center">Our Sponsors</h2>
    </div>

    <!-- Left Fade -->
    <div class="absolute left-0 top-0 h-full w-16 bg-gradient-to-r from-white to-transparent pointer-events-none z-10"></div>
    <!-- Right Fade -->
    <div class="absolute right-0 top-0 h-full w-16 bg-gradient-to-l from-white to-transparent pointer-events-none z-10"></div>

    <div class="overflow-hidden relative w-full">
        <div class="flex gap-8 md:gap-12 animate-scroll whitespace-nowrap w-max">
            @foreach($sponsors as $sponsor)
                @if($sponsor->logo)
                    <a href="{{ $sponsor->website ?? '#' }}" 
                       target="_blank" 
                       class="flex-shrink-0 md:min-w-[200px] flex justify-center items-center transition-transform transform hover:scale-110"
                    >
                        <img src="{{ asset('storage/' . $sponsor->logo) }}" class="h-16 object-contain">
                    </a>
                @endif
            @endforeach

            <!-- Duplicate for seamless loop -->
            @foreach($sponsors as $sponsor)
                @if($sponsor->logo)
                    <a href="{{ $sponsor->website ?? '#' }}" 
                       target="_blank" 
                       class="flex-shrink-0 md:min-w-[200px] flex justify-center items-center transition-transform transform hover:scale-110"
                    >
                        <img src="{{ asset('storage/' . $sponsor->logo) }}" class="h-16 object-contain">
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</section>

<style>
@keyframes scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

.animate-scroll {
    animation: scroll 25s linear infinite;
}
</style>



<!-- Latest News -->
<section class="py-12 bg-gray-50" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-6 text-center">Latest News</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($latestPosts as $post)
                <div class="bg-white shadow rounded overflow-hidden hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    @if($post->hero_image)
                        <img src="{{ asset('storage/' . $post->hero_image) }}" class="w-full h-48 object-cover" alt="{{ $post->title }}">
                    @endif
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">{{ $post->title }}</h3>
                        <p class="text-sm text-gray-600 mb-4">{{ Str::limit($post->excerpt, 80) }}</p>
                        <a href="#" class="text-green-800 font-semibold">Read More →</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



<!-- Next Game -->
@if($nextGame)
<section class="bg-gray-100 py-12" data-aos="fade-up">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6 text-center">Next Game</h2>
        @if($nextGame->poster)
            <img src="{{ asset('storage/' . $nextGame->poster) }}" class="mx-auto h-56 object-cover rounded mb-4" data-aos="zoom-in">
        @endif
        <p class="font-bold text-lg">
            Olive Rugby 
            @if($nextGame->is_home_team ?? true)
                (Home) 
            @else
                (Away) 
            @endif
            vs {{ $nextGame->opponent }}
        </p>
        <p class="text-gray-600">{{ $nextGame->match_at->format('M d, Y H:i') }} — {{ $nextGame->venue }}</p>
        @if($nextGame->score_home !== null && $nextGame->score_away !== null)
            <p class="text-xl font-bold text-green-800 mt-2">
                {{ $nextGame->score_home }} - {{ $nextGame->score_away }}
            </p>
        @endif
    </div>
</section>
@endif







<!-- Call to Action -->
<section class="py-16 bg-green-800 text-white text-center" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4">Join Us in Making a Difference</h2>
        <p class="mb-8 max-w-2xl mx-auto">
            Your support helps Olive Rugby train players, host community events, and build a lasting legacy.
            Every contribution brings us closer to empowering the next generation.
        </p>
        <div class="flex justify-center gap-6 flex-wrap">
            <a href="{{ route('donate') }}" 
               class="bg-yellow-500 text-white px-6 py-3 rounded-lg font-semibold shadow hover:bg-yellow-400 transition">
               Donate Now
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-300 pt-12 pb-6" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8">

            <!-- About -->
            <div>
                <h3 class="text-white text-lg font-bold mb-4">Olive Rugby</h3>
                <p class="text-sm">
                    Building a lasting legacy through rugby — inspiring youth, empowering communities, and fostering talent.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white text-lg font-bold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">About Us</a></li>
                    <li><a href="{{ route('games.index') }}" class="hover:text-white transition">Fixtures</a></li>
                    <li><a href="{{ route('events.index') }}" class="hover:text-white transition">Events</a></li>
                    <li><a href="{{ route('donate') }}" class="hover:text-white transition">Contact</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h3 class="text-white text-lg font-bold mb-4">Support</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('donate') }}" class="hover:text-white transition">Donate</a></li>
                    <li><a href="{{ route('donate') }}" class="hover:text-white transition">Sponsorship</a></li>
                    <li><a href="{{ route('donate') }}" class="hover:text-white transition">Volunteer</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-white text-lg font-bold mb-4">Contact Us</h3>
                <p class="text-sm">📍 Nairobi, Kenya</p>
                <p class="text-sm">📞 +254 700 000 000</p>
                <p class="text-sm">✉️ info@oliverugby.org</p>
                <div class="flex gap-4 mt-4">
                    <a href="#" class="hover:text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-white"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- Font Awesome (for icons) -->
<script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>




@endsection
