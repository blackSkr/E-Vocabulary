<x-filament::widget>
    <x-filament::card>
        <h2 class="text-xl font-semibold text-primary-600 mb-6">Kontributor Kosakata</h2>

        <ul class="space-y-4">
            @foreach ($topUsers as $index => $user)
                <li class="flex items-center justify-between p-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm">
                    <div class="flex items-center space-x-4">
                        {{-- <div class="text-lg font-bold text-primary-500 w-6 text-center">
                            #{{ $index + 1 }}
                        </div> --}}
                        <div class="flex flex-col">
                            <span class="text-base font-medium text-gray-900 dark:text-white">
                                {{ $user['name'] }}
                            </span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                NIM: {{ $user['nim'] ?? '-' }}
                            </span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                Program Studi : {{ $user['prodi']  }}
                            </span>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-sm font-semibold text-success-600">
                            {{ $user['total'] }} kosakata
                        </span>
                    </div>
                </li>
            @endforeach
        </ul>
    </x-filament::card>
</x-filament::widget>
