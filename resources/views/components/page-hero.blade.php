<!-- Page Hero -->
<section class="relative h-[40vh] flex items-center justify-center text-center text-white bg-center bg-cover"
         style="background-image: url('{{ asset($background) }}');">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- Content -->
    <div class="relative z-10 px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $title }}</h1>

        <!-- Optional subtitle -->
        @isset($subtitle)
            <p class="text-lg md:text-xl text-gray-200 mb-2">{{ $subtitle }}</p>
        @endisset

        <!-- Breadcrumb -->
        <nav class="text-sm">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span class="mx-2">›</span>
            <span>{{ $title }}</span>
        </nav>
    </div>
</section>
