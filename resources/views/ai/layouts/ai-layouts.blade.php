<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CivilLex | Q&A</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}


        @stack('styles')
        @vite('resources/css/app.css')
</head>
{{-- @livewireScripts --}}
{{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
<body class="bg-secondary">
    @yield('content')

    @stack('scripts')
</body>
</html>