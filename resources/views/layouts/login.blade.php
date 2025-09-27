<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist with Login Popup</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: white;
            color: black;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
        /* Modal background */
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            justify-content: center;
            align-items: center;
        }

        /* Modal content */
        .modal-content {
            background-color: white;
            color: black;
            padding: 3rem 2.5rem;
            border-radius: 12px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .close-button {
            position: absolute;
            top: 15px;
            right: 15px;
            color: black;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

  

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 flex-grow">
       
        
        <!-- Login Button to trigger modal -->
        <div class="flex justify-center my-8">
            <button id="open-login-modal" class="bg-black text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-800 transition-colors">
                Open Login/Sign Up
            </button>
        </div>

       
    </main>

   

    <!-- The Login Modal -->
    <div id="login-modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>

            <!-- Login Form -->
            <div id="login-form-container">
                <div class="text-center mb-6">
                    <h2 class="text-3xl font-light">Welcome Back</h2>
                    <p class="text-gray-600 mt-2">Log in to your account</p>
                </div>
                
                <form class="space-y-4">
                    <div>
                        <label for="login-email" class="sr-only">Email address</label>
                        <input type="email" id="login-email" class="w-full bg-white border border-gray-300 text-black placeholder-gray-500 p-3 rounded-lg focus:ring-black focus:border-black" placeholder="Email address">
                    </div>
                    <div>
                        <label for="login-password" class="sr-only">Password</label>
                        <input type="password" id="login-password" class="w-full bg-white border border-gray-300 text-black placeholder-gray-500 p-3 rounded-lg focus:ring-black focus:border-black" placeholder="Password">
                    </div>
                    <div class="flex justify-between items-center text-sm text-gray-600">
                        <div class="flex items-center">
                            <input type="checkbox" id="login-remember" class="w-4 h-4 text-black bg-gray-100 rounded border-gray-300 focus:ring-black">
                            <label for="login-remember" class="ml-2">Remember me</label>
                        </div>
                        <a href="#" class="hover:underline text-black">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full bg-black text-white p-3 rounded-lg font-semibold hover:bg-gray-800 transition-colors">
                        Log In
                    </button>
                </form>

                <div class="text-center mt-6 text-sm text-gray-600">
                    Don't have an account? <a href="#" id="show-signup" class="text-black font-semibold hover:underline">Sign Up</a>
                </div>
            </div>

            <!-- Sign Up Form -->
            <div id="signup-form-container" class="hidden">
                <div class="text-center mb-6">
                    <h2 class="text-3xl font-light">Create Account</h2>
                    <p class="text-gray-600 mt-2">Start your journey with us</p>
                </div>
                
                <form class="space-y-4">
                    <div>
                        <label for="signup-email" class="sr-only">Email address</label>
                        <input type="email" id="signup-email" class="w-full bg-white border border-gray-300 text-black placeholder-gray-500 p-3 rounded-lg focus:ring-black focus:border-black" placeholder="Email address">
                    </div>
                    <div>
                        <label for="signup-password" class="sr-only">Password</label>
                        <input type="password" id="signup-password" class="w-full bg-white border border-gray-300 text-black placeholder-gray-500 p-3 rounded-lg focus:ring-black focus:border-black" placeholder="Password">
                    </div>
                    <div>
                        <label for="confirm-password" class="sr-only">Confirm Password</label>
                        <input type="password" id="confirm-password" class="w-full bg-white border border-gray-300 text-black placeholder-gray-500 p-3 rounded-lg focus:ring-black focus:border-black" placeholder="Confirm Password">
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <input type="checkbox" id="terms" class="w-4 h-4 text-black bg-gray-100 rounded border-gray-300 focus:ring-black">
                        <label for="terms" class="ml-2">I agree to the <a href="#" class="text-black font-semibold hover:underline">Terms & Conditions</a></label>
                    </div>
                    <button type="submit" class="w-full bg-black text-white p-3 rounded-lg font-semibold hover:bg-gray-800 transition-colors">
                        Sign Up
                    </button>
                </form>

                <div class="text-center mt-6 text-sm text-gray-600">
                    Already have an account? <a href="#" id="show-login" class="text-black font-semibold hover:underline">Log In</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('login-modal');
            const openModalBtn = document.getElementById('open-login-modal');
            const closeBtn = document.querySelector('.close-button');
            const loginFormContainer = document.getElementById('login-form-container');
            const signupFormContainer = document.getElementById('signup-form-container');
            const showSignupLink = document.getElementById('show-signup');
            const showLoginLink = document.getElementById('show-login');

            // Function to open the modal
            openModalBtn.addEventListener('click', () => {
                modal.style.display = 'flex';
            });

            // Function to close the modal
            closeBtn.addEventListener('click', () => {
                modal.style.display = 'none';
            });

            // Close the modal when clicking outside of it
            window.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });

            // Show the sign-up form and hide the login form
            showSignupLink.addEventListener('click', (e) => {
                e.preventDefault();
                loginFormContainer.classList.add('hidden');
                signupFormContainer.classList.remove('hidden');
            });

            // Show the login form and hide the sign-up form
            showLoginLink.addEventListener('click', (e) => {
                e.preventDefault();
                signupFormContainer.classList.add('hidden');
                loginFormContainer.classList.remove('hidden');
            });
        });
    </script>
</body>
</html>
