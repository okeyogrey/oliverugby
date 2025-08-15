@extends('layouts.app')

@section('content')
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
        <div class="mb-12 text-center"  data-aos="fade-up">
            <h2 class="text-2xl font-bold mb-4 text-center text-green-800">Our Vision</h2>
            <p class="text-gray-700">
                To be the leading force in nurturing rugby excellence while creating opportunities for youth
                to excel in sports and life.
            </p>
        </div>

        <!-- Mission -->
        <div class="mb-12 text-center" data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-2xl font-bold mb-4 text-center text-green-800">Our Mission</h2>
            <p class="text-gray-700">
                To empower individuals through rugby by fostering skills, discipline, teamwork, and leadership.
                We strive to positively impact our community through initiatives that inspire change and growth.
            </p>
        </div>

        <!-- The Team -->
        <div class="mb-12 text-center" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-2xl font-bold mb-4 text-center text-green-800">Meet the Team</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white shadow rounded-lg p-4 text-center">
                    <img src="{{ asset('images/team1.jpg') }}" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="font-bold">John Doe</h3>
                    <p class="text-sm text-gray-500">Head Coach</p>
                </div>
                <div class="bg-white shadow rounded-lg p-4 text-center">
                    <img src="{{ asset('images/team2.jpg') }}" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="font-bold">Jane Smith</h3>
                    <p class="text-sm text-gray-500">Assistant Coach</p>
                </div>
                <div class="bg-white shadow rounded-lg p-4 text-center">
                    <img src="{{ asset('images/team3.jpg') }}" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="font-bold">Mark Johnson</h3>
                    <p class="text-sm text-gray-500">Team Captain</p>
                </div>
            </div>
        </div>

        <!-- Management -->
        <div data-aos="fade-up" data-aos-delay="300" class="text-center">
            <h2 class="text-2xl font-bold mb-4 text-center text-green-800">Management</h2>
            <p class="text-gray-700">
                Our management team works tirelessly to ensure that Olive Rugby operates smoothly both on and off
                the pitch. From organizing matches to securing sponsorships, their dedication fuels our mission.
            </p>
        </div>




        <!-- Community Impact -->
<section class="py-16 bg-white" data-aos="fade-up">
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
