<nav class="bg-white shadow-sm fixed w-full z-50">
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center w-full">
            
            <!-- Kiri: Logo + Sapaan + Brand -->
            <div class="flex items-center gap-3 pl-2">
                <!-- Logo -->
                <div class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center text-white font-bold">
                    CE
                </div>

                <!-- Sapaan Dinamis -->
                <span id="greeting" class="text-sm text-gray-600 sm:inline">
                    <!-- Isi oleh JS -->
                </span>

                <!-- Brand Name -->
                <span class="text-xl font-semibold text-gray-800 hidden md:inline">
                    CivilLex
                </span>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden md:flex space-x-8">
                <a href="#section-hero" class="text-gray-700 font-medium hover:text-green-600 transition">Home</a>
                <a href="#section-main" class="text-gray-700 font-medium hover:text-green-600 transition">Dictionary</a>
                <a href="#section-contribute" class="text-gray-700 font-medium hover:text-green-600 transition">Contribute</a>
            </div>

            <!-- Hamburger Button -->
            <button class="md:hidden text-gray-700 focus:outline-none" id="menu-toggle">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden hidden bg-white py-2 px-6 shadow-md" id="mobile-menu">
        <a href="#section-hero" class="block py-3 text-gray-700 border-b border-gray-100">Home</a>
        <a href="#section-main" class="block py-3 text-gray-700 border-b border-gray-100">Dictionary</a>
        <a href="#section-contribute" class="block py-3 text-gray-700">Contribute</a>
    </div>
</nav>
