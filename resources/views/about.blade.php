@extends('layouts.app')

@section('content')


@include('components.page-hero', [
    'title' => 'About Us',
    'background' => 'images/about-banner.jpg',
    'subtitle' => 'Building a legacy on and off the pitch'
])


<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-5xl">
        <!-- Heading -->
        <!-- <h1 class="text-4xl font-bold text-center mb-12">About Us</h1> -->

        <!-- Intro -->
        <div class="mb-12 text-center">
            <p class="text-gray-700">
                Olive Rugby is a community-driven organization committed to developing rugby talent
                and promoting sportsmanship at every level. Our mission goes beyond the pitch,
                focusing on mentorship, education, and holistic development.
            </p>
        </div>

        <!-- Vision -->
        <section class="py-5 bg-white container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div class="mb-12 text-center"  data-aos="fade-right" data-aos-delay="100">
                <h2 class="text-2xl font-bold mb-4 text-center text-green-800">Our Vision</h2>
                <p class="text-gray-700">
                    To be the leading force in nurturing rugby excellence while creating opportunities for youth
                    to excel in sports and life for youth to excel in sports and life as a whole in general for a better world.
                </p>
            </div>

            <!-- Mission -->
            <div class="mb-12 text-center" data-aos="fade-left" data-aos-delay="100">
                <h2 class="text-2xl font-bold mb-4 text-center text-green-800">Our Mission</h2>
                <p class="text-gray-700">
                    To empower individuals through rugby by fostering skills, discipline, teamwork, and leadership.
                    We strive to positively impact our community through initiatives that inspire change and growth.
                </p>
            </div>
        </section>

        
        <!-- The Team -->
        <section class="py-1 bg-gray-50">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-2xl font-bold mb-4 text-center text-green-800">Meet the Team</h2>
                    <div class="grid md:grid-cols-3 gap-10">
                      <div class="bg-white rounded-xl shadow-lg p-6 hover:scale-105 transform transition">
                        <img src="{{ asset('images/team1.jpg') }}" class="w-32 h-32 rounded-full mx-auto mb-4">
                        <h3 class="text-xl font-bold">John Doe</h3>
                        <p class="text-gray-500 mb-4">Founder</p>
                        <div class="flex justify-center space-x-4 text-green-700">
                          <i class="fab fa-linkedin"></i>
                          <i class="fab fa-twitter"></i>
                        </div>
                      </div>

                      <div class="bg-white rounded-xl shadow-lg p-6 hover:scale-105 transform transition">
                        <img src="{{ asset('images/team1.jpg') }}" class="w-32 h-32 rounded-full mx-auto mb-4">
                        <h3 class="text-xl font-bold">John Doe</h3>
                        <p class="text-gray-500 mb-4">Co-Founder</p>
                        <div class="flex justify-center space-x-4 text-green-700">
                          <i class="fab fa-linkedin"></i>
                          <i class="fab fa-twitter"></i>
                        </div>
                      </div>

                      <div class="bg-white rounded-xl shadow-lg p-6 hover:scale-105 transform transition">
                        <img src="{{ asset('images/team1.jpg') }}" class="w-32 h-32 rounded-full mx-auto mb-4">
                        <h3 class="text-xl font-bold">John Doe</h3>
                        <p class="text-gray-500 mb-4">Head of Affairs</p>
                        <div class="flex justify-center space-x-4 text-green-700">
                          <i class="fab fa-linkedin"></i>
                          <i class="fab fa-twitter"></i>
                        </div>
                      </div>
                      <!-- repeat for others -->
                    </div>
            </div>

        </section>

        <section class="py-20 bg-gray-50">
        <!-- Management -->
        <div data-aos="fade-up" data-aos-delay="300" class="text-center">
            <h2 class="text-2xl font-bold mb-4 text-center text-green-800">Management</h2>
            <p class="text-gray-700">
                Our management team works tirelessly to ensure that Olive Rugby operates smoothly both on and off
                the pitch. From organizing matches to securing sponsorships, their dedication fuels our mission.
            </p>
        </div>
        </section>




        <!-- Community Impact -->
<section class="py-5 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-4 max-w-6xl">
        <h2 class="text-2xl font-bold mb-12 text-center text-green-800">Our Community Impact</h2>

        <!-- Timeline Wrapper -->
        <div class="relative border-l-4 border-green-800 md:border-l-0 md:border-t-4 md:flex md:justify-between md:items-start">

            <!-- Impact Item 1 -->
            <div class="mb-12 md:mb-0 md:w-1/4 text-center md:text-left relative">
                <div class="absolute -left-5 md:left-auto md:-top-5 bg-green-800 text-white w-8 h-8 rounded-full flex items-center justify-center shadow-lg">
                    <i class="fa-solid fa-users"></i>
                </div>
                <h3 class="text-xl font-bold mt-4">500+ Players Trained</h3>
                <p class="text-gray-600 mt-2">We have mentored and trained hundreds of youth, equipping them with rugby skills and life values.</p>
            </div>

            <!-- Impact Item 2 -->
            <div class="mb-12 md:mb-0 md:w-1/4 text-center md:text-left relative">
                <div class="absolute -left-5 md:left-auto md:-top-5 bg-green-800 text-white w-8 h-8 rounded-full flex items-center justify-center shadow-lg">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3 class="text-xl font-bold mt-4">50+ Community Events</h3>
                <p class="text-gray-600 mt-2">Hosting charity matches, clinics, and workshops to unite communities and inspire the next generation.</p>
            </div>

            <!-- Impact Item 3 -->
            <div class="mb-12 md:mb-0 md:w-1/4 text-center md:text-left relative">
                <div class="absolute -left-5 md:left-auto md:-top-5 bg-green-800 text-white w-8 h-8 rounded-full flex items-center justify-center shadow-lg">
                    <i class="fas fa-trophy"></i>
                </div>
                <h3 class="text-xl font-bold mt-4">10+ Championships</h3>
                <p class="text-gray-600 mt-2">Our teams have achieved excellence in local and national tournaments, inspiring pride in our community.</p>
            </div>

            <!-- Impact Item 4 -->
            <div class="md:w-1/4 text-center md:text-left relative">
                <div class="absolute -left-5 md:left-auto md:-top-5 bg-green-800 text-white w-8 h-8 rounded-full flex items-center justify-center shadow-lg">
                    <i class="fas fa-school"></i>
                </div>
                <h3 class="text-xl font-bold mt-4">School Partnerships</h3>
                <p class="text-gray-600 mt-2">Partnering with schools to introduce rugby programs and provide sports education.</p>
            </div>
            
        </div>
    </div>
</section>

<!-- FontAwesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    </div>
</section>
@endsection
