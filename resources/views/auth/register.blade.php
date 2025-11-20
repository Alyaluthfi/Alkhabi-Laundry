<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alkhabi Laundry - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>
<body class="bg-cover bg-center" style="background-image: url('/img/bg-login.jpg');"> 
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white/10 backdrop-blur-lg p-8 rounded-2xl shadow-lg w-full max-w-md">
            <h2 class="text-pink-300 text-2xl font-bold mb-2 text-center">Create Account</h2>
            <p class="text-pink-100 text-center mb-6">Join Alkhabi to start your journey</p>
            
            @if ($errors->any())
                <div class="mb-4 bg-red-500/30 border border-red-400 text-red-200 px-4 py-3 rounded-lg relative" role="alert">
                    <strong class="font-bold">Oops!</strong>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div class="mb-4">
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required 
                           class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-300" value="{{ old('name') }}">
                </div>
                
                <!-- Email -->
                <div class="mb-4">
                    <input type="email" id="email" name="email" placeholder="Enter your email" required 
                           class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-300" value="{{ old('email') }}">
                </div>
                
                <!-- Password -->
                <div class="mb-4">
                    <input type="password" id="password" name="password" placeholder="Create a password" required 
                           class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-300">
                </div>
                
                <!-- Confirm Password -->
                <div class="mb-6">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required 
                           class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-300">
                </div>
                
                <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white py-3 rounded-lg transition duration-200 font-semibold mb-4">
                    Register
                </button>
                
                <p class="text-center text-pink-100 text-sm">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-pink-300 hover:text-pink-200 font-medium">Log in</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
