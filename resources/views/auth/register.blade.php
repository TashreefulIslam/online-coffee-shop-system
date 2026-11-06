<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - Brew Haven</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-orange-900">Create Account</h1>
            <p class="text-gray-600 mt-2">Join Brew Haven to order coffee online</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold mb-2">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                @error('phone')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Address</label>
                <textarea name="address" rows="3" class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">{{ old('address') }}</textarea>
                @error('address')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Password</label>
                <input type="password" name="password" required class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                @error('password')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>
            <button type="submit" class="w-full rounded-lg bg-orange-900 py-3 font-semibold text-white hover:bg-orange-800">Register</button>
        </form>

        <div class="mt-6 text-center text-sm">
            <a href="{{ route('login') }}" class="text-orange-700 hover:text-orange-900">Already have an account? Login</a>
        </div>
    </div>
</body>
</html>
