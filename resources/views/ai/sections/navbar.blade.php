    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center">
                    <i class="fas fa-comments text-white"></i>
                </div>
                <span class="text-xl font-semibold text-gray-800">CivilLex</span>
            </div>
            <div class="hidden md:flex items-center space-x-6">
                <a href="/" class="text-gray-600 hover:text-primary transition">Home</a>
                {{-- <a href="#" class="text-gray-600 hover:text-primary transition">About</a> --}}
                {{-- <a href="#" class="text-gray-600 hover:text-primary transition">Resources</a> --}}
                {{-- <a href="#" class="text-gray-600 hover:text-primary transition">Contact</a> --}}
            </div>
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-600 hover:text-primary focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <div class="px-4 py-3 flex flex-col space-y-2">
                <a href="/" class="text-gray-600 hover:text-primary transition py-2">Home</a>
                {{-- <a href="#" class="text-gray-600 hover:text-primary transition py-2">About</a> --}}
                {{-- <a href="#" class="text-gray-600 hover:text-primary transition py-2">Resources</a> --}}
                {{-- <a href="#" class="text-gray-600 hover:text-primary transition py-2">Contact</a> --}}
            </div>
        </div>
    </nav>