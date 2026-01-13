<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Id Card Kopkanus - Login Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Space Grotesk', sans-serif;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .morphic-input {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 
                inset 2px 2px 5px rgba(0, 0, 0, 0.1),
                inset -2px -2px 5px rgba(255, 255, 255, 0.9);
        }

        .morphic-button {
            background: linear-gradient(145deg, #007AFF, #00C6FF);
            box-shadow: 
                5px 5px 15px rgba(0, 0, 0, 0.2),
                -5px -5px 15px rgba(255, 255, 255, 0.1);
        }

        .animated-background {
            background: linear-gradient(
                45deg,
                #FF3366,
                #00C6FF,
                #7B41FF,
                #FF3366
            );
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translateY(0px) }
            50% { transform: translateY(-20px) }
            100% { transform: translateY(0px) }
        }

        .shine-effect {
            position: relative;
            overflow: hidden;
        }

        .shine-effect::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.1) 50%,
                rgba(255, 255, 255, 0) 100%
            );
            transform: rotate(45deg);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) rotate(45deg); }
            100% { transform: translateX(100%) rotate(45deg); }
        }

        .logo-bounce {
            animation: bounce 2s ease infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="animated-background min-h-screen flex items-center justify-center p-4">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute w-96 h-96 -top-12 -left-12 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute w-96 h-96 -bottom-12 -right-12 bg-white/10 rounded-full blur-3xl"></div>
    </div>

    <div class="glass-effect rounded-3xl p-8 w-full max-w-md relative overflow-hidden shine-effect">
        <!-- Logo and App Name -->
        <div class="text-center mb-8">
            <div class="logo-bounce mb-4">
                <img src="{{ asset('image/kopkanuslogo.png') }}" alt="E-Id Card Kopkanus Logo" class="w-24 h-24 mx-auto">
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">E-Id Card Kopkanus</h1>
            <p class="text-white/80 text-lg mb-3">Sistem Kartu Identitas Digital Koperasi Karyawan Nusantara</p>
            <div class="w-16 h-1 bg-gradient-to-r from-blue-400 to-purple-400 mx-auto rounded-full"></div>
        </div>

        <!-- Login Form -->
        <form action="{{ route('user.login') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Email Input -->
            <div class="relative group">
                <input type="email" 
                       name="email" 
                       placeholder="Email Address"
                       required
                       class="morphic-input w-full px-6 py-4 rounded-2xl text-gray-700 text-lg focus:outline-none transition-all duration-300 placeholder-gray-400"
                >
                <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 transition-all duration-300 group-hover:w-full"></div>
            </div>

            <!-- ID Input -->
            <div class="relative group">
                <input type="text" 
                       name="id_karyawan" 
                       placeholder="Member ID"
                       required
                       class="morphic-input w-full px-6 py-4 rounded-2xl text-gray-700 text-lg focus:outline-none transition-all duration-300 placeholder-gray-400"
                >
                <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 transition-all duration-300 group-hover:w-full"></div>
            </div>

            <!-- Login Button -->
            <button type="submit"
                    class="morphic-button w-full py-4 px-6 rounded-2xl text-white font-semibold text-lg transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] mt-8">
                Sign In to Portal
            </button>
        </form>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mt-6 bg-red-500/10 border border-red-500/20 rounded-xl p-4" role="alert">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-red-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <ul class="text-red-100 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Footer -->
        <div class="mt-6 text-center text-white/60 text-sm">
            © 2025 E-Id Card Kopkanus. All rights reserved.
        </div>
    </div>

    <!-- Background Particles -->
    <div class="fixed top-0 left-0 w-full h-full pointer-events-none">
        <div class="absolute w-2 h-2 bg-white rounded-full" style="top: 10%; left: 45%; animation: floating 4s ease-in-out infinite;"></div>
        <div class="absolute w-2 h-2 bg-white rounded-full" style="top: 20%; left: 75%; animation: floating 3s ease-in-out infinite;"></div>
        <div class="absolute w-2 h-2 bg-white rounded-full" style="top: 80%; left: 15%; animation: floating 5s ease-in-out infinite;"></div>
        <div class="absolute w-2 h-2 bg-white rounded-full" style="top: 60%; left: 85%; animation: floating 4.5s ease-in-out infinite;"></div>
    </div>
</body>
</html>