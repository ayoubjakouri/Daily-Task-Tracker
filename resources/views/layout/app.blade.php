<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Daily Task Tracker')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="min-h-screen">
        {{-- Navbar (later) --}}
        
        <main class="container mx-auto p-4">
            @yield('content')
        </main>
    </div>

</body>
</html>

