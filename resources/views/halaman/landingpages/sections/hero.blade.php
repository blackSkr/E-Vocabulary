<section id="section-hero" class="h-screen flex items-center justify-center bg-gradient-to-b from-white to-gray-50 relative overflow-hidden"
    style="background-image: url('{{ asset('assets/background/bg-2.svg') }}'); background-size: cover; background-position: bottom;">

    <div class="container mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center">

            <!-- Judul -->
            <h1 class="sr-fade-up text-4xl md:text-5xl font-extrabold text-gray-800 mb-6"
                style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">
                <span class="text-indigo-950 drop-shadow-md">
                    Civil Engineering
                </span> 
            </h1>

            <!-- Deskripsi -->
            <p class="sr-fade-up text-lg text-gray-600 mb-8">
                The ultimate bilingual reference for civil engineers.<br class="hidden md:inline">
                <span class="text-primary font-semibold">Search</span>, 
                <span class="text-primary font-semibold">hear</span>, and 
                <span class="text-primary font-semibold">master</span> your engineering vocabulary.
            </p>

            <!-- Search Bar -->
            <form method="GET" action="{{ route('kosakata.index') }}" class="sr-fade-up relative max-w-md mx-auto" autocomplete="off">
                <input 
                    type="text" 
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="🔍 Search terms in English or Indonesian..."
                    class="w-full bg-white/90 border border-gray-300 rounded-full py-3 pl-5 pr-12 text-sm text-gray-700 shadow-md focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition duration-300"
                >
                <button 
                    type="submit"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-green-600 hover:text-green-700 transition"
                    aria-label="Search"
                >
                    <i class="fas fa-search text-lg text-indigo-950"></i>
                </button>
            </form>

            <!-- Contoh Kata -->
            <div class="sr-fade-up mt-8 text-indigo-950 text-sm">
                <span class="font-medium text-indigo-950">Try: </span>
                @foreach (['Beton', 'Beam', 'Pondasi'] as $term)
                    <a href="{{ route('kosakata.index', ['search' => $term]) }}"
                       class="inline-block text-indigo-950 hover:underline hover:text-green-800 mx-1 transition duration-150">
                        {{ $term }}
                    </a>
                @endforeach
            </div>

        </div>
    </div>
</section>
