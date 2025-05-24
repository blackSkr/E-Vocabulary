@if ($terms->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
        @foreach ($terms as $term)
            <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition">
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
                        <img src="{{ $term->contoh_gambar }}" alt="Images of {{ $term->kata_inggris }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="flex justify-between text-xs text-gray-500">
                        <span class="bg-gray-100 px-3 py-1 rounded-full">{{ $term->jenis_kosakata->jenis_kosakata ?? 'Uncategorized' }}</span>
                        <span>{{ $term->views ?? 0 }} views</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-10 flex justify-center">
        {{ $terms->withQueryString()->links() }}
    </div>
@else
    <p class="text-center text-gray-400 italic mt-16">No terms found for the selected filter.</p>
@endif
