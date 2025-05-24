<nav class="bg-white shadow-sm fixed w-full z-50">
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center w-full">
            <!-- Kiri: Logo + Sapaan -->
            <div class="flex items-center gap-2 pl-2">
                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white font-bold">CE</div>
                <span id="greeting" class="text-sm text-gray-600 md:hidden"></span>
                <span class="text-xl font-semibold text-gray-800 hidden md:block">CivilLex</span>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden md:flex space-x-8">
                <a href="#section-hero" class="nav-link text-gray-700 font-medium">Home</a>
                <a href="#section-main" class="nav-link text-gray-700 font-medium">Dictionary</a>
                <a href="#section-contribute" class="nav-link text-gray-700 font-medium">Contribute</a>
            </div>

            <!-- Hamburger -->
            <button class="md:hidden text-gray-700 focus:outline-none" id="menu-toggle">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>



    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden hidden bg-white py-2 px-6 shadow-md" id="mobile-menu">
        <a href="#section-hero" class="nav-mobile-link block py-3 text-gray-700 border-b border-gray-100">Home</a>
        <a href="#section-main" class="nav-mobile-link block py-3 text-gray-700 border-b border-gray-100">Dictionary</a>
        <a href="#section-contribute" class="nav-mobile-link block py-3 text-gray-700">Contribute</a>
    </div>
</nav>
