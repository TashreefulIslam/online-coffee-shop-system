<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Brew Haven - Coffee Shop')</title>
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary: #6F4E37;
            --secondary: #DAB49D;
            --accent: #C68B59;
            --bg: #F8F4F0;
            --text: #2C1810;
        }
        body {
            color: var(--text);
            background-color: var(--bg);
        }
        .btn-primary {
            @apply bg-orange-900 hover:bg-orange-800 text-white font-semibold py-2 px-4 rounded transition;
        }
        .btn-secondary {
            @apply bg-orange-600 hover:bg-orange-500 text-white font-semibold py-2 px-4 rounded transition;
        }
        .btn-outline {
            @apply border-2 border-orange-900 text-orange-900 hover:bg-orange-900 hover:text-white font-semibold py-2 px-4 rounded transition;
        }
    </style>
</head>
<body class="antialiased">
    @include('layouts.navbar')

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mx-4 mt-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded mx-4 mt-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mx-4 mt-4">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
