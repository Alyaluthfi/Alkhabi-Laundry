<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alkhabi Laundry - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center" style="background-image: url('/img/bg-login.jpg');">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white/10 backdrop-blur-lg p-8 rounded-2xl shadow-lg w-full max-w-md">
            <h2 class="text-pink-300 text-2xl font-bold mb-2 text-center">Welcome Back</h2>
            <p class="text-pink-100 text-center mb-6">Log in to continue your journey</p>

            @if (session('status'))
                <div class="mb-4 text-sm text-green-100 bg-green-500/30 p-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <input type="email" name="email" id="email" placeholder="Enter your email" required
                        class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-300"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-200 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <input type="password" name="password" id="password" placeholder="Enter your password" required
                        class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-300">
                    @error('password')
                        <p class="text-red-200 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox" name="remember" class="text-pink-500 border-gray-300 rounded shadow-sm focus:ring-pink-500">
                    <label for="remember_me" class="ml-2 text-sm text-pink-100">Remember me</label>
                </div>

                <button type="submit"
                    class="w-full bg-pink-500 hover:bg-pink-600 text-white py-3 rounded-lg transition duration-200 font-semibold mb-4">
                    Log in
                </button>

                @if (Route::has('password.request'))
                    <p class="text-sm text-pink-100 text-center mb-4">
                        <a href="{{ route('password.request') }}" class="text-pink-300 hover:text-pink-200 underline">Forgot your password?</a>
                    </p>
                @endif

                <p class="text-center text-pink-100 text-sm">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-pink-300 hover:text-pink-200 font-medium">Register</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>