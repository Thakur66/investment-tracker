<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Investment Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

   <header class="bg-gray-800 text-white px-6 py-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">

        <h1 class="text-2xl font-bold">
            Investment Tracker
        </h1>

        <nav class="flex gap-6">
            <a href="{{ route('dashboard') }}"
               class="hover:text-gray-300">
                Dashboard
            </a>

            <a href="{{ route('investments.index') }}"
               class="hover:text-gray-300">
                Investments
            </a>

            <a href="{{ route('investments.create') }}"
               class="hover:text-gray-300">
                Add Investment
            </a>
        </nav>

    </div>
    </header>

    <main class="bg-gray-100 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-6">
        @yield('content')
    </div>
    </main>

</body>
</html>