<section id="section-main"> 
<main class="relative py-16 bg-gradient-to-br from-blue-50 via-white to-green-50 overflow-hidden">
        <!-- Decorative Background Grid Pattern -->
        <div class="absolute inset-0 pointer-events-none opacity-30">
            <svg class="w-full h-full " xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" stroke-width="0.5" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" class="text-gray-300" />
            </svg>
        </div>

        <div class="relative container mx-auto px-6 z-10">
            <!-- Filter Section -->
            <div class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 drop-shadow-sm">Engineering Terms</h2>
                    <p class="text-sm text-gray-500">Showing {{ $terms->total() }} terms</p>
                </div>

                <form id="filterForm" method="GET" action="{{ route('kosakata.index') }}" class="w-full md:w-auto flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                    <!-- Category -->
                    <div class="relative w-full sm:w-auto">
                        <label for="kategori" class="sr-only">Category</label>
                        <select name="kategori" id="kategoriSelect"
                            class="appearance-none w-full bg-white border border-gray-300 text-gray-700 px-3 py-2 pr-8 rounded-md text-sm leading-tight shadow-sm focus:ring-1 focus:ring-primary focus:outline-none transition">
                            <option value="">All Categories</option>
                            @foreach ($jenisKosakata as $jenis)
                                <option value="{{ $jenis->id }}" {{ request('kategori') == $jenis->id ? 'selected' : '' }}>
                                    {{ $jenis->jenis_kosakata }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>

                    <!-- Sort -->
                    <div class="relative w-full sm:w-auto">
                        <label for="sort" class="sr-only">Sort</label>
                        <select name="sort" id="sortSelect"
                            class="appearance-none w-full bg-white border border-gray-300 text-gray-700 px-3 py-2 pr-8 rounded-md text-sm leading-tight shadow-sm focus:ring-1 focus:ring-primary focus:outline-none transition">
                            <option value="">Sort by: Relevance</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                            <option value="views" {{ request('sort') == 'views' ? 'selected' : '' }}>Most Viewed</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Grid & Pagination (Your original structure preserved) -->
            <div id="termResults">
                @if ($terms->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                    @foreach ($terms as $index => $term)
                        <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition {{ $index >= 3 ? 'hidden md:block' : '' }}">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $term->kata_inggris }}</h3>
                                        <p class="text-gray-600">{{ $term->kata_indo }}</p>
                                    </div>
                                    <button class="bg-gray-100 text-primary p-2 rounded-full hover:bg-primary hover:text-white transition">
                                        <i class="fas fa-volume-up"></i>
                                    </button>
                                </div>
                                <p class="text-sm italic text-gray-500 mb-4">"{{ $term->contoh_penerapan }}"</p>
                                <div class="h-40 rounded-lg overflow-hidden mb-4 bg-gray-100">
                                    <img src="{{ asset('storage/' . $term->contoh_gambar) }}" alt="Images of {{ $term->kata_inggris }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                </div>
                                <div class="flex justify-between text-xs text-gray-500">
                                    <span class="bg-gray-100 px-3 py-1 rounded-full">{{ $term->jenis_kosakata->jenis_kosakata ?? 'Uncategorized' }}</span>
                                    <span>{{ $term->views ?? 0 }} views</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                    <!-- ORIGINAL Pagination (Tidak Diubah) -->
                    <div class="mt-10 flex justify-center">
                        <nav class="flex items-center space-x-1 text-sm">
                            @if ($terms->onFirstPage())
                                <span class="px-3 py-2 rounded-full bg-gray-100 text-gray-400">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            @else
                                <a href="{{ $terms->previousPageUrl() }}" class="px-3 py-2 rounded-full border border-gray-300 text-gray-600 hover:bg-primary hover:text-white transition">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            @endif

                            @for ($i = 1; $i <= $terms->lastPage(); $i++)
                                @if ($i == $terms->currentPage())
                                    <span class="px-3 py-2 rounded-full bg-green-600 text-white font-semibold">{{ $i }}</span>
                                @elseif ($i == 1 || $i == $terms->lastPage() || abs($terms->currentPage() - $i) <= 1)
                                    <a href="{{ $terms->url($i) }}" class="px-3 py-2 rounded-full border border-gray-300 text-gray-600 hover:bg-primary hover:text-white transition">{{ $i }}</a>
                                @elseif ($i == 2 && $terms->currentPage() > 4 || $i == $terms->lastPage() - 1 && $terms->currentPage() < $terms->lastPage() - 3)
                                    <span class="px-3 py-2 text-gray-400">...</span>
                                @endif
                            @endfor

                            @if ($terms->hasMorePages())
                                <a href="{{ $terms->nextPageUrl() }}" class="px-3 py-2 rounded-full border border-gray-300 text-gray-600 hover:bg-primary hover:text-white transition">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @else
                                <span class="px-3 py-2 rounded-full bg-gray-100 text-gray-400">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            @endif
                        </nav>
                    </div>
                @else
                    <p class="text-center text-gray-400 italic mt-16">No terms found for the selected filter.</p>
                @endif
            </div>
        </div>
    </main>
</section>
<!-- AJAX for Filtering -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const kategoriSelect = document.getElementById('kategoriSelect');
    const sortSelect = document.getElementById('sortSelect');
    const resultContainer = document.getElementById('termResults');

    kategoriSelect.addEventListener('change', updateResults);
    sortSelect.addEventListener('change', updateResults);

    function updateResults() {
        const kategori = kategoriSelect.value;
        const sort = sortSelect.value;
        const url = new URL("{{ route('kosakata.index') }}", window.location.origin);
        if (kategori) url.searchParams.append('kategori', kategori);
        if (sort) url.searchParams.append('sort', sort);

        fetch(url)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.querySelector('#termResults');
                if (newContent) resultContainer.innerHTML = newContent.innerHTML;
            })
            .catch(error => console.error('Failed to fetch filtered data:', error));
    }
});
</script>
