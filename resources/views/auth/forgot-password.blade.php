<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Forgot Password - Brew Haven</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">
        <h1 class="text-3xl font-bold text-orange-900 text-center">Forgot Password</h1>
        <p class="mt-2 text-center text-gray-600">Enter your email to receive a reset link.</p>

        @if(session('status'))
            <div class="mt-4 rounded bg-green-50 px-4 py-3 text-green-700">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="w-full rounded-lg bg-orange-900 py-3 font-semibold text-white hover:bg-orange-800">Send Reset Link</button>
        </form>

        <div class="mt-6 text-center text-sm">
            <a href="{{ route('login') }}" class="text-orange-700 hover:text-orange-900">Back to login</a>
        </div>
    </div>
</body>
</html>
