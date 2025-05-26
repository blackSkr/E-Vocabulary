<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3E7B27',
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        .floating {
            animation: float 3s ease-in-out infinite;
        }
        .glow {
            transition: all 0.3s ease;
        }
        .glow:hover {
            box-shadow: 0 0 15px rgba(62, 123, 39, 0.5);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col items-center justify-center p-4 font-sans">
    <div class="max-w-md w-full text-center space-y-8">
        <!-- Animated 404 graphic -->
        <div class="relative">
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-48 h-48 rounded-full bg-primary bg-opacity-10"></div>
            </div>
            <div class="relative z-10 flex flex-col items-center">
                <svg class="w-32 h-32 text-primary floating" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h1 class="text-6xl font-bold text-gray-800 mt-4">404</h1>
            </div>
        </div>

        <!-- Message -->
        <div class="space-y-4">
            <h2 class="text-2xl font-semibold text-gray-800">Page Not Found</h2>
            <p class="text-gray-600">The page you're looking for doesn't exist or has been moved. Let's get you back on track.</p>
        </div>

        <!-- Interactive buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/" class="px-6 py-3 bg-primary text-white rounded-lg font-medium glow hover:bg-opacity-90 transition duration-300 transform hover:scale-105">
                Go to Homepage
            </a>
            <button id="helpBtn" class="px-6 py-3 border border-primary text-primary rounded-lg font-medium glow hover:bg-primary hover:bg-opacity-10 transition duration-300 transform hover:scale-105">
                Need Help?
            </button>
        </div>

        <!-- Additional resources (hidden by default) -->
        <div id="helpSection" class="hidden pt-4 text-left bg-gray-100 rounded-lg p-4 mt-4">
            <h3 class="font-medium text-gray-800 mb-2">Here are some helpful links:</h3>
            <ul class="space-y-2">
                <li><a href="/support" class="text-primary hover:underline">Contact Support</a></li>
                <li><a href="/blog" class="text-primary hover:underline">Our Blog</a></li>
                <li><a href="/faq" class="text-primary hover:underline">FAQ</a></li>
            </ul>
        </div>
        
    </div>

    <script>
        // Toggle help section
        document.getElementById('helpBtn').addEventListener('click', function() {
            const helpSection = document.getElementById('helpSection');
            helpSection.classList.toggle('hidden');
            
            // Change button text based on state
            if (helpSection.classList.contains('hidden')) {
                this.textContent = 'Need Help?';
            } else {
                this.textContent = 'Hide Help';
            }
        });

        // Add animation to search bar on focus
        const searchInput = document.querySelector('input[type="text"]');
        searchInput.addEventListener('focus', function() {
            this.parentElement.classList.add('ring-2', 'ring-primary', 'ring-opacity-50');
            this.parentElement.classList.remove('border-gray-300');
        });
        searchInput.addEventListener('blur', function() {
            this.parentElement.classList.remove('ring-2', 'ring-primary', 'ring-opacity-50');
            this.parentElement.classList.add('border-gray-300');
        });
    </script>
</body>
</html>