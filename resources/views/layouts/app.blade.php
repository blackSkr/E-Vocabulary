<!DOCTYPE html>
<html>
<head>
    <title>Tanya AI</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">
    {{ $slot }}
    @livewireScripts
    @vite('resources/js/app.js')
</body>
</html>
