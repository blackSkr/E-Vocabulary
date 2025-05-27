@extends('ai.layouts.ai-layouts')

@section('title', 'CivilLex | UPT Bahasa')

@push('scripts')
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
 @endpush
@push('styles')
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FFFDF6;
            scroll-behavior: smooth;
        }
        
        .chat-container {
            max-height: calc(100vh - 180px);
        }
        
        .message-enter {
            animation: slideUp 0.3s ease-out;
        }
        
        .typing-indicator::after {
            content: '...';
            animation: typing 1.5s infinite;
        }
        
        @keyframes typing {
            0% { content: '.'; }
            33% { content: '..'; }
            66% { content: '...'; }
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #3E7B27;
            border-radius: 3px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #2d5a1c;
        }
        </style>
@endpush
@section('content')
    @include('ai.sections.navbar')
    @livewire('tanya-ai')
    @include('ai.sections.footer')
@endsection

    @push('scripts')

    <script>
                // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        // Dynamic greeting
        const greetingEl = document.getElementById('greeting');
        if (greetingEl) {
            const hour = new Date().getHours();
            let greeting = '';
            if (hour >= 4 && hour < 12) {
                greeting = '☀️ Good morning';
            } else if (hour >= 12 && hour < 18) {
                greeting = '🌤️ Good afternoon';
            } else {
                greeting = '🌙 Good evening';
            }
            greetingEl.textContent = greeting;
        }

    </script>
    @endpush