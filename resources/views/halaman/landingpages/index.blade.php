@extends('halaman.landingpages.layouts.landing-layout')

@section('title', 'CivilLex | UPT Bahasa')

@push('styles')
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#3E7B27',
                    secondary: '#FFFDF6',
                },
                animation: {
                    'fade-in': 'fadeIn 0.5s ease-in-out',
                    'slide-up': 'slideUp 0.5s ease-out',
                    'pulse-slow': 'pulse 3s infinite',
                },
                keyframes: {
                    fadeIn: {
                        '0%': { opacity: '0' },
                        '100%': { opacity: '1' },
                    },
                    slideUp: {
                        '0%': { transform: 'translateY(20px)', opacity: '0' },
                        '100%': { transform: 'translateY(0)', opacity: '1' },
                    }
                }
            }
        }
    }
    
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        background-color: #FFFDF6;
        scroll-behavior: smooth;
    }
    button.fixed {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #3E7B27; /* Warna mencolok */
    color: white;
    border: none;
    padding: 16px 20px;
    border-radius: 50%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Bayangan agar menonjol */
    z-index: 1000;
    cursor: pointer;
    font-size: 24px;
    transition: background-color 0.3s ease;
    }

    button.fixed:hover {
        background-color: #ff5722; /* Warna saat hover */
    }
    /* ... your custom styles here ... */
</style>
@endpush

@section('content')
    @include('halaman.landingpages.sections.navbar')
    @include('halaman.landingpages.sections.hero')
    @include('halaman.landingpages.sections.main')
    @include('halaman.landingpages.sections.cta')
    @include('halaman.landingpages.sections.footer')
    
@endsection

@push('scripts')
<script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <script>
        //scroll halus
            document.addEventListener('click', function(e) {
        const link = e.target.closest('a[href^="#"]');
        if (!link) return; // Bukan <a> link internal
        const href = link.getAttribute('href');

        if (href.length > 1 && document.querySelector(href)) {
            e.preventDefault();
            const target = document.querySelector(href);
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });

    // animasi
        ScrollReveal().reveal('.sr-fade-up', {
        distance: '40px',
        origin: 'bottom',
        duration: 800,
        easing: 'ease-out',
        interval: 150,
        reset: false // kalau true, animasi ulang tiap scroll
    });




        // Toggle Mobile Menu
        document.getElementById('menu-toggle').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Sapaan Dinamis
        const greetingEl = document.getElementById('greeting');
        if (greetingEl) {
            const hour = new Date().getHours();
            let greeting = '';
            if (hour >= 4 && hour < 12) {
                greeting = '☀️ Selamat pagi';
            } else if (hour >= 12 && hour < 18) {
                greeting = '🌤️ Selamat sore';
            } else {
                greeting = '🌙 Selamat malam';
            }
            greetingEl.textContent = greeting;
        }


        
        // Audio button functionality with animation
        document.querySelectorAll('.audio-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.stopPropagation();
                this.innerHTML = '<i class="fas fa-volume-up animate-pulse"></i>';
                
                // Simulate audio playback
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-volume-up"></i>';
                }, 2000);
            });
        });
        
        // Search functionality with debounce
        const searchBar = document.querySelector('.search-bar');
        let searchTimeout;
        
        searchBar.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                console.log('Searching for:', this.value);
                // In real implementation, this would trigger API call
            }, 500);
        });
        
        // Initialize ScrollReveal animations
        ScrollReveal().reveal('.vocab-card', {
            delay: 200,
            interval: 100,
            origin: 'bottom',
            distance: '20px',
            easing: 'cubic-bezier(0.5, 0, 0, 1)',
        });
        
        // Category filter functionality
        const categorySelect = document.querySelector('select:first-of-type');
        categorySelect.addEventListener('change', function() {
            console.log('Filtering by:', this.value);
            // In real implementation, this would filter the cards
        });
        
        // Sort functionality
        const sortSelect = document.querySelector('select:last-of-type');
        sortSelect.addEventListener('change', function() {
            console.log('Sorting by:', this.value);
            // In real implementation, this would sort the cards
        });
        
        // Pagination functionality
        document.querySelectorAll('.pagination-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Add active state
                document.querySelectorAll('.pagination-btn').forEach(btn => {
                    btn.classList.remove('bg-primary', 'text-white');
                    btn.classList.add('border', 'border-gray-200', 'text-gray-700');
                });
                
                if(!this.querySelector('i')) {
                    this.classList.add('bg-primary', 'text-white');
                    this.classList.remove('border', 'border-gray-200', 'text-gray-700');
                }
                
$0
                console.log('Loading page:', this.textContent);
            });
        });
        
        // Floating action button
        const fab = document.querySelector('button.fixed');
        fab.addEventListener('click', function() {
            // Scroll to contribute section
            document.querySelector('section.py-20').scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>
@endpush
