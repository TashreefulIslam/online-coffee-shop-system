<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Brew Haven</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-orange-900">Brew Haven</h1>
            <p class="text-gray-600 mt-2">Login to continue your coffee journey</p>
        </div>

        @if(session('status'))
            <div class="mb-4 rounded bg-green-50 px-4 py-3 text-green-700">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Password</label>
                <input type="password" name="password" required class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                @error('password')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="remember" class="rounded border-gray-300">
                Remember me
            </label>
            <button type="submit" class="w-full rounded-lg bg-orange-900 py-3 font-semibold text-white hover:bg-orange-800">Login</button>
        </form>

        <div class="mt-6 flex items-center justify-between text-sm">
            <a href="{{ route('password.request') }}" class="text-orange-700 hover:text-orange-900">Forgot password?</a>
            <a href="{{ route('register') }}" class="text-orange-700 hover:text-orange-900">Create account</a>
        </div>
    </div>
</body>
</html>
