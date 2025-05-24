<section id="section-hero">
    <header class="pt-32 pb-20 bg-gradient-to-b from-white to-gray-50">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto text-center">
                <!-- Judul -->
                <h1 class="pt-25 text-4xl md:text-5xl font-extrabold text-gray-800 mb-6 animate-slide-up">
                    <span class="bg-gradient-to-r from-green-500 to-teal-500 bg-clip-text text-transparent drop-shadow-md">
                        Civil Engineering
                    </span> 
                    Lexicon
                </h1>

                <!-- Deskripsi -->
                <p class="text-lg text-gray-600 mb-8 animate-slide-up" style="animation-delay: 0.2s">
                    The ultimate bilingual reference for civil engineers.<br class="hidden md:inline">
                    <span class="text-primary font-semibold">Search</span>, 
                    <span class="text-primary font-semibold">hear</span>, and 
                    <span class="text-primary font-semibold">master</span> your engineering vocabulary.
                </p>

                <!-- Search Bar -->
                <form method="GET" action="{{ route('kosakata.index') }}" class="relative max-w-md mx-auto animate-slide-up" style="animation-delay: 0.4s" autocomplete="off">
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
                        <i class="fas fa-search text-lg"></i>
                    </button>
                </form>

                <!-- Contoh Kata -->
                <div class="mt-8 animate-slide-up text-gray-500 text-sm" style="animation-delay: 0.6s">
                    <span class="font-medium text-gray-400">Try: </span>
                    @foreach (['Beton', 'Beam', 'Pondasi'] as $term)
                        <a href="{{ route('kosakata.index', ['search' => $term]) }}"
                        class="inline-block text-green-600 hover:underline hover:text-green-800 mx-1 transition duration-150">
                            {{ $term }}
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </header>
</section>
