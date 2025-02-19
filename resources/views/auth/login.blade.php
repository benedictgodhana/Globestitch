<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maritime System - Login</title>
    <!-- Toastr for notifications -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @font-face {
            font-family: 'Futura LT';
            src: url('/fonts/futura-lt/FuturaLT-Book.ttf') format('woff2'),
                 url('/fonts/futura-lt/FuturaLT.ttf') format('woff'),
                 url('/fonts/futura-lt/FuturaLT-Condensed.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            margin: 0;
            font-family: 'Futura LT', sans-serif;
        }

        /* Background Image */
        .login-background {
            background-image: url('https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }
    </style>
</head>
<body class="futura antialiased">
    <div class="login-background">
        <div class="login-card">
            <!-- Maritime Logo -->
            <div class="flex justify-center mb-6">
                <a href="/">
                <img src="/images/logo.png" alt="Globestitch Logo" class="w-32 h-32 sm:w-48 sm:h-48">

                </a>
</div>
<h2 class="text-2xl sm:text-3xl font-semibold text-center text-gray-800 mb-6">
    Globestitch
</h2>


            <!-- Status Message Container -->
            <div id="status-message" class="mb-4 text-sm text-green-600 hidden"></div>
            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div class="space-y-1">
                    <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0z"/>
                            </svg>
                        </span>
                        <input
                            id="email"
                            class="pl-10 w-full rounded-md border border-gray-300 py-2.5 px-3 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                            type="email"
                            name="email"
                            required
                            autofocus />
                        <div class="mt-1 text-red-500 text-sm" id="email-error"></div>
                    </div>
                </div>
                <!-- Password -->
                <div class="mt-4 space-y-1">
                    <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0h2a6 6 0 000 12h6z"/>
                            </svg>
                        </span>
                        <input
                            id="password"
                            class="pl-10 w-full rounded-md border border-gray-300 py-2.5 px-3 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                            type="password"
                            name="password"
                            required />
                        <div class="mt-1 text-red-500 text-sm" id="password-error"></div>
                    </div>
                </div>
                <!-- Remember Me -->
                <div class="mt-4 flex items-center justify-between">
                    <label class="flex items-center text-sm text-gray-600">
                        <input type="checkbox" name="remember" class="mr-2 border-gray-300 rounded">
                        Remember me
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-700">
                        Forgot password?
                    </a>
                </div>
                <div class="mt-6">
                    <button id="loginButton" type="submit"
                        class="w-full flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white py-2.5 px-4 rounded-md transition-colors">
                        <svg id="loadingSpinner" class="hidden animate-spin h-5 w-5 mr-2 text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 0116 0h-2a6 6 0 00-12 0H4z">
                            </path>
                        </svg>
                        <span id="buttonText">Sign In</span>
                    </button>
                </div>
                <!-- Register Link -->
                <div class="text-center mt-4">
                    <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:text-blue-700">
                        Don't have an account? Register
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById("loginForm").addEventListener("submit", async function(event) {
            event.preventDefault(); // Prevent default form submission
            const formData = new FormData(this);
            const loginButton = document.getElementById("loginButton");
            const buttonText = document.getElementById("buttonText");
            const loadingSpinner = document.getElementById("loadingSpinner");

            // Clear previous errors
            document.getElementById('email-error').textContent = "";
            document.getElementById('password-error').textContent = "";

            // Show loading state
            loginButton.disabled = true;
            buttonText.textContent = "Signing In...";
            loadingSpinner.classList.remove("hidden");
            toastr.info('Logging in, please wait...', 'Processing');

            try {
                const response = await fetch("{{ route('login') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name=_token]').value,
                        "Accept": "application/json",
                    },
                    body: formData
                });

                const isJson = response.headers.get("content-type")?.includes("application/json");
                if (!response.ok) {
                    if (isJson) {
                        const data = await response.json();
                        if (data.errors) {
                            if (data.errors.email) {
                                document.getElementById('email-error').textContent = data.errors.email[0];
                            }
                            if (data.errors.password) {
                                document.getElementById('password-error').textContent = data.errors.password[0];
                            }
                            toastr.error('Invalid credentials. Please try again.', 'Login Failed');
                        }
                    } else {
                        toastr.error('Something went wrong. Please try again.', 'Error');
                    }
                    return;
                }

                // If response is successful
                toastr.success('Login successful! Redirecting...', 'Success');
                setTimeout(() => {
                    window.location.href = "{{ route('dashboard') }}";
                }, 2000);
            } catch (error) {
                console.error("Login error:", error);
                toastr.error('Something went wrong. Please try again.', 'Error');
            } finally {
                // Reset button state after request completes
                loginButton.disabled = false;
                buttonText.textContent = "Sign In";
                loadingSpinner.classList.add("hidden");
            }
        });
    </script>
</body>
</html>
