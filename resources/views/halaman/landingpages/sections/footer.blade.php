    <footer class="bg-gray-900 text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div>
                    <div class="mb-4">
                        <img src="{{ asset('images/logo/Logo_Polnes_2015-sekarang.png') }}" alt="Logo CivilLex"
                            class="w-32 h-auto md:w-48 lg:w-56 object-contain">
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Explore</h3>
                    <ul class="space-y-2">
                        {{-- <li><a href="#" class="text-gray-400 hover:text-white text-sm transition">Dictionary</a></li> --}}
                        {{-- <li><a href="#" class="text-gray-400 hover:text-white text-sm transition">Categories</a></li> --}}
                        {{-- <li><a href="#" class="text-gray-400 hover:text-white text-sm transition">Popular Terms</a></li> --}}
                        <li><a href="https://polnes.ac.id/" class="text-gray-400 hover:text-white text-sm transition">Layanan Polnes</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        {{-- <li><a href="#" class="text-gray-400 hover:text-white text-sm transition">Contribute</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm transition">Style Guide</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm transition">API Access</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm transition">Help Center</a></li> --}}
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Connect</h3>
                    <div class="flex space-x-4 mb-4">
                        {{-- <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-github"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-youtube"></i></a> --}}
                    </div>
                    {{-- <p class="text-gray-400 text-sm mb-2">Subscribe for updates</p>
                    <div class="flex">
                        <input type="email" placeholder="Your email" 
                               class="text-gray-800 text-sm py-2 px-4 rounded-l w-full focus:outline-none">
                        <button class="bg-primary text-white py-2 px-4 rounded-r hover:bg-green-700 transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div> --}}
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 text-center">
                <p class="text-gray-500 text-sm">
                    &copy; 2025 Pams. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Floating Action Button -->
    <!-- Tombol FAB (Ukuran Lebih Kecil) -->
    <button id="mainButton" class="fixed bottom-6 right-6 w-12 h-12 bg-green-600 text-white rounded-full shadow-xl flex items-center justify-center hover:bg-green-700 transition-transform transform hover:scale-110 z-50 focus:outline-none relative">
        <!-- Garis-garis -->
        <span class="line horizontal absolute w-6 h-0.5 bg-white transition-transform duration-300 ease-in-out"></span>
        <span class="line vertical absolute w-6 h-0.5 bg-white transition-transform duration-300 ease-in-out"></span>
    </button>

    <!-- Menu Opsi -->
    <div id="menuOptions" class="opacity-0 scale-95 pointer-events-none transition-all duration-300 flex flex-col items-end space-y-2 fixed bottom-24 right-6 z-40">
        <button class="flex items-center space-x-2 bg-white text-gray-800 px-3 py-1.5 rounded-lg shadow-lg hover:bg-gray-100 transform hover:scale-105 transition text-sm">
            <i class="fas fa-flag text-green-600"></i>
            <span>Laporan</span>
        </button>
        <button class="flex items-center space-x-2 bg-white text-gray-800 px-3 py-1.5 rounded-lg shadow-lg hover:bg-gray-100 transform hover:scale-105 transition text-sm">
            <i class="fas fa-phone text-green-600"></i>
            <span>Kontak</span>
        </button>
        {{-- <button class="flex items-center space-x-2 bg-white text-gray-800 px-3 py-1.5 rounded-lg shadow-lg hover:bg-gray-100 transform hover:scale-105 transition text-sm">
            <i class="fas fa-cog text-green-600"></i>
            <span>Pengaturan</span>
        </button> --}}
    </div>

    <!-- CSS Tambahan -->
    <style>
        .scale-100 { transform: scale(1); }
        .scale-95 { transform: scale(0.95); }

        .horizontal {
            transform: rotate(0deg);
        }

        .vertical {
            transform: rotate(90deg);
        }

        .active .horizontal {
            transform: rotate(45deg);
        }

        .active .vertical {
            transform: rotate(-45deg);
        }
    </style>

    <!-- Script -->
    <script>
        const mainButton = document.getElementById('mainButton');
        const menuOptions = document.getElementById('menuOptions');
        let isOpen = false;

        function toggleMenu(forceClose = false) {
            isOpen = forceClose ? false : !isOpen;

            mainButton.classList.toggle('active', isOpen);

            menuOptions.classList.toggle('opacity-0', !isOpen);
            menuOptions.classList.toggle('pointer-events-none', !isOpen);
            menuOptions.classList.toggle('scale-100', isOpen);
            menuOptions.classList.toggle('scale-95', !isOpen);
        }

        mainButton.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleMenu();
        });

        document.addEventListener('click', (e) => {
            if (isOpen && !mainButton.contains(e.target) && !menuOptions.contains(e.target)) {
                toggleMenu(true);
            }
        });
    </script>
