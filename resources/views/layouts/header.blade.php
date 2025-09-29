<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeravii E-commerce Header</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3jnBOZHyT6RtZpmFNpK0N6D+PfYZ7R6pujISiFDUFxIr05oig3NbS1Ry6j3Tz7kBxKuX3sI5GxU5l5z5qU2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Owl Carousel Theme (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-5NxzS4e7j2SpZAt4EvsC0BpvyEuk+qS0bkkCm1cW0XkyRjO6jwxKF1u9IiMaivGi99ZTSdKCbFf8xC3l4r5V5Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        :root {
            --primary-color: #556B2F;
            --secondary-color: #556B2F;
            --accent-color: #f59e0b;
            --dark-color: #1f2937;
            --light-color: #f9fafb;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .nav-link {
            position: relative;
            padding-bottom: 4px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--primary-color);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover:after {
            width: 100%;
        }
        
        .nav-link:hover {
            color: var(--primary-color);
        }
        
        .dropdown:hover .dropdown-menu {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        
        .dropdown-menu {
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 8px;
        }
        
        .mobile-menu {
            transition: max-height 0.4s ease-in-out;
            max-height: 0;
            overflow: hidden;
        }
        
        .mobile-menu.open {
            max-height: 500px;
        }
        
        .promo-banner {
            background: linear-gradient(90deg, var(--secondary-color), #6B8E23);
            position: relative;
            overflow: hidden;
        }
        
        .promo-banner:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: shine 3s infinite;
        }
        
        @keyframes shine {
            0% { left: -100%; }
            20% { left: 100%; }
            100% { left: 100%; }
        }
        
        .search-box {
            transition: all 0.3s ease;
        }
        
        .search-box:focus-within {
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        
        .icon-button {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }
        
        .icon-button:hover {
            transform: translateY(-2px);
            color: var(--primary-color);
        }
        
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #556B2F;
            color: white;
            font-size: 10px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .category-nav {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

         .cart-drawer {
            transition: transform 0.3s ease-in-out;
        }
        .cart-overlay {
            transition: opacity 0.3s ease-in-out;
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
<body class="font-sans antialiased bg-white">






    
    <!-- Top Announcement Bar -->
    <div class="promo-banner w-full text-white py-2 text-center text-sm font-medium">
        <div class="container mx-auto">
            <p>✨ 5% OFF on orders above Rs 699 • Free Shipping on orders above Rs 999 ✨</p>
        </div>
    </div>

    <!-- Middle Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 lg:px-8 py-1">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center">
                        <img class="h-20 w-auto" src="{{ asset('assets/images/logo-meeravii.png') }}" alt="Meeravii Logo">
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="hidden lg:flex flex-1 mx-8 max-w-2xl">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-[#556B2F]"></i>
                        </div>
                        <input type="text" placeholder="What are you looking for?" class="search-box w-full py-3 pl-10 pr-12 bg-gray-100 text-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-300 focus:bg-white placeholder:text-sm placeholder:text-[#556B2F]">
                        <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-[#556B2F] hover:bg-white hover:text-[#556B2F] hover:border-[#556B2F] border text-white rounded-full px-8 py-2 text-sm font-medium transition-colors">
                            Search
                        </button>
                    </div>
                </div>

                <!-- Right Icons -->
                <div class="flex items-center space-x-5">

                    {{-- <a href="#" class="icon-button text-gray-700 relative">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='11' cy='11' r='8'%3E%3C/circle%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'%3E%3C/line%3E%3C/svg%3E" width="24" height="24"/>

                    </a> --}}

                    <div id="open-login-modal">

                        <div class="hidden md:flex items-center space-x-1 text-gray-900  cursor-pointer icon-button">
                          <span class="text-lg font-medium me-2 text-[#556B2F]">Login</span>
                          <img src="https://img.icons8.com/?size=100&id=15265&format=png&color=000000" width="28" height="2" alt="">
                          <i class="fas fa-chevron-down text-xs ml-1 transition-transform group-hover:rotate-180"></i>
                        </div>
                   
                    </div>
                    
                    <a href="/wishlist" class="icon-button text-gray-700">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z'%3E%3C/path%3E%3C/svg%3E" width="24" height="24"/>
                         <span class="cart-badge">2</span>
                    </a>
                   
                    <a href="#" id="cart-icon"  class="icon-button text-gray-700 relative">
                       <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4zM3 6h18'%3E%3C/path%3E%3Cpath d='M16 10a4 4 0 0 1-8 0'%3E%3C/path%3E%3C/svg%3E" width="24" height="24"/>
                        <span class="cart-badge">3</span>
                    </a>

                   
                    
                    <!-- Mobile menu button -->
                    <button class="lg:hidden focus:outline-none text-gray-700" id="mobile-menu-button">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Search (hidden on larger screens) -->
            <div class="mt-4 lg:hidden">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" placeholder="Search for products..." class="w-full py-2.5 pl-10 pr-4 bg-gray-100 text-gray-800 rounded-full focus:outline-none focus:ring-1 focus:ring-blue-300">
                </div>
            </div>
        </div>
    </header>

    <!-- Bottom Header (Categories) -->
    <nav class="category-nav bg-white border-t border-gray-100 py-4 sticky top-0 z-20 shadow-md">
    <div class="container mx-auto px-4">
            <div class="hidden lg:flex justify-center items-center space-x-8 text-sm">
                <a href="/shop" class="nav-link text-gray-700">All Products</a>
                <a href="#" class="nav-link text-gray-700">Men</a>
                <a href="#" class="nav-link text-gray-700">Women</a>
                <a href="#" class="nav-link text-gray-700">Kids</a>
                <a href="#" class="nav-link text-gray-700">Beauty</a>
                <a href="#" class="nav-link text-gray-700">Watches</a>
                <a href="#" class="nav-link text-gray-700">Gifts</a>
                <a href="#" class="nav-link text-gray-700">Brands</a>
                <a href="#" class="nav-link text-gray-700">Homestop</a>

                <!-- Dropdown -->
                <div class="relative dropdown group">
                    <a href="#" class="nav-link text-gray-700 flex items-center">
                        Style Hub
                        <i class="fas fa-chevron-down text-xs ml-1 transition-transform group-hover:rotate-180"></i>
                    </a>
                    <div class="dropdown-menu absolute mt-3 w-48 bg-white z-10 rounded-md py-2">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">New Arrivals</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Trending Now</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Editor's Picks</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Style Guide</a>
                    </div>
                </div>

                <a href="#" class="nav-link text-red-500 font-semibold">Bargans</a>
                <a href="#" class="nav-link text-yellow-600 font-semibold">Luxe</a>
            </div>
            
            <!-- Mobile category scroll (hidden on larger screens) -->
            <div class="lg:hidden overflow-x-auto whitespace-nowrap py-2 hide-scrollbar">
                <div class="inline-flex space-x-4 px-1">
                    <a href="#" class="text-xs px-3 py-1.5 bg-gray-100 rounded-full text-gray-700 font-medium">Men</a>
                    <a href="#" class="text-xs px-3 py-1.5 bg-gray-100 rounded-full text-gray-700 font-medium">Women</a>
                    <a href="#" class="text-xs px-3 py-1.5 bg-gray-100 rounded-full text-gray-700 font-medium">Kids</a>
                    <a href="#" class="text-xs px-3 py-1.5 bg-gray-100 rounded-full text-gray-700 font-medium">Beauty</a>
                    <a href="#" class="text-xs px-3 py-1.5 bg-gray-100 rounded-full text-gray-700 font-medium">Watches</a>
                    <a href="#" class="text-xs px-3 py-1.5 bg-gray-100 rounded-full text-gray-700 font-medium">Gifts</a>
                    <a href="#" class="text-xs px-3 py-1.5 bg-gray-100 rounded-full text-gray-700 font-medium">Brands</a>
                    <a href="#" class="text-xs px-3 py-1.5 bg-gray-100 rounded-full text-gray-700 font-medium">Homestop</a>
                    <a href="#" class="text-xs px-3 py-1.5 bg-gray-100 rounded-full text-red-500 font-medium">Bargans</a>
                    <a href="#" class="text-xs px-3 py-1.5 bg-gray-100 rounded-full text-yellow-600 font-medium">Luxe</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu (Hidden by default) -->
    <div class="lg:hidden mobile-menu bg-white border-t border-gray-200 shadow-lg" id="mobile-menu">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col space-y-4 text-gray-700">
                <a href="#" class="py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-600 flex items-center">
                    <i class="fas fa-user-circle mr-3"></i> Login / Sign Up
                </a>
                <a href="#" class="py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-600">Men</a>
                <a href="#" class="py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-600">Women</a>
                <a href="#" class="py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-600">Kids</a>
                <a href="#" class="py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-600">Beauty</a>
                <a href="#" class="py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-600">Watches</a>
                <a href="#" class="py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-600">Gifts</a>
                <a href="#" class="py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-600">Brands</a>
                <a href="#" class="py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-600">Homestop</a>
                
                <div>
                    <button class="flex items-center w-full py-2 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-600 mobile-dropdown-toggle">
                        <span>Style Hub</span>
                        <i class="fas fa-chevron-down text-xs ml-auto"></i>
                    </button>
                    <div class="mt-1 pl-6 space-y-2 hidden mobile-dropdown">
                        <a href="#" class="block py-2 text-gray-700 hover:text-blue-600">New Arrivals</a>
                        <a href="#" class="block py-2 text-gray-700 hover:text-blue-600">Trending Now</a>
                        <a href="#" class="block py-2 text-gray-700 hover:text-blue-600">Editor's Picks</a>
                    </div>
                </div>
                
                <a href="#" class="py-2 px-4 rounded-lg hover:bg-red-50 text-red-500 font-medium">Bargans</a>
                <a href="#" class="py-2 px-4 rounded-lg hover:bg-yellow-50 text-yellow-600 font-medium">Luxe</a>
                
                <div class="pt-4 border-t border-gray-200">
                    <div class="flex justify-around">
                        <a href="#" class="flex flex-col items-center text-xs">
                            <i class="fas fa-gift text-lg mb-1"></i>
                            <span>Offers</span>
                        </a>
                        <a href="#" class="flex flex-col items-center text-xs">
                            <i class="fas fa-question-circle text-lg mb-1"></i>
                            <span>Help</span>
                        </a>
                        <a href="#" class="flex flex-col items-center text-xs">
                            <i class="fas fa-map-marker-alt text-lg mb-1"></i>
                            <span>Store Locator</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Cart Drawer (initially hidden off-screen) -->
    <div id="cart-drawer" class="fixed top-0 right-0 h-full w-full sm:w-[400px] bg-white shadow-lg z-50 transform translate-x-full cart-drawer">
        <!-- Cart Header -->
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Shopping Cart</h2>
            <button id="close-cart" class="text-gray-500 hover:text-gray-900 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Cart Body -->
        <div class="p-6 h-[calc(100vh-200px)] overflow-y-auto">
            <div class="flex items-center space-x-4 mb-4">
                <img src="{{ asset('assets/images/featureProducts/product1.jpeg') }}" alt="Product 1" class="w-20 h-20 object-cover rounded-md">
                <div class="flex-grow">
                    <p class="font-semibold text-gray-900">Embroidered Bodysuit</p>
                    <p class="text-sm text-gray-600">₹499.90</p>
                    <div class="flex items-center mt-2 text-xs text-gray-500">
                        <span class="mr-2">Qty: 1</span>
                        <button class="text-red-500 hover:underline">Remove</button>
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-4 mb-4">
                <img src="{{ asset('assets/images/featureProducts/product2.jpeg') }}" alt="Product 2" class="w-20 h-20 object-cover rounded-md">
                <div class="flex-grow">
                    <p class="font-semibold text-gray-900">Floral Print Jumpsuit</p>
                    <p class="text-sm text-gray-600">₹699.90</p>
                    <div class="flex items-center mt-2 text-xs text-gray-500">
                        <span class="mr-2">Qty: 1</span>
                        <button class="text-red-500 hover:underline">Remove</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cart Footer -->
        <div class="p-6 border-t border-gray-200 absolute bottom-0 w-full">
            <div class="flex justify-between font-semibold mb-4">
                <span>Subtotal:</span>
                <span>₹1119.80</span>
            </div>
            <a href="/place-order">
            <button class="w-full bg-[#556B2F] text-white py-3 rounded-md hover:bg-gray-900 transition-colors">CHECKOUT</button>
            </a>
            <a href="/">
            <button id="continue-shopping" class="w-full mt-2 py-3 text-gray-700 rounded-md hover:text-gray-900 transition-colors">Continue Shopping</button>
            </a>
        </div>
    </div>

    <!-- Cart Overlay (initially hidden) -->
    <div id="cart-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden cart-overlay opacity-0"></div>


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

                <!-- Login Form -->
<div id="login-alert" class="hidden mb-4 p-3 rounded text-white"></div>
                
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

                <!-- Signup Form -->
<div id="signup-alert" class="hidden mb-4 p-3 rounded text-white"></div>
                
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Cart Drawer Logic
            const cartIcon = document.getElementById('cart-icon');
            const cartDrawer = document.getElementById('cart-drawer');
            const closeCartBtn = document.getElementById('close-cart');
            const continueShoppingBtn = document.getElementById('continue-shopping');
            const cartOverlay = document.getElementById('cart-overlay');

            function toggleCart() {
                const isCartVisible = !cartDrawer.classList.contains('translate-x-full');
                if (isCartVisible) {
                    cartDrawer.classList.add('translate-x-full');
                    cartOverlay.classList.add('hidden', 'opacity-0');
                    cartOverlay.classList.remove('opacity-100');
                } else {
                    cartDrawer.classList.remove('translate-x-full');
                    cartOverlay.classList.remove('hidden');
                    setTimeout(() => cartOverlay.classList.add('opacity-100'), 10);
                }
            }

            cartIcon.addEventListener('click', toggleCart);
            closeCartBtn.addEventListener('click', toggleCart);
            continueShoppingBtn.addEventListener('click', toggleCart);
            cartOverlay.addEventListener('click', toggleCart);
        });
    </script>

    <script>
        // Toggle mobile menu
        document.getElementById('mobile-menu-button').addEventListener('click', () => {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('open');
            
            // Change icon based on state
            const icon = document.getElementById('mobile-menu-button').querySelector('i');
            if (mobileMenu.classList.contains('open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Toggle mobile dropdowns
        document.querySelectorAll('.mobile-dropdown-toggle').forEach(button => {
            button.addEventListener('click', () => {
                const dropdown = button.nextElementSibling;
                dropdown.classList.toggle('hidden');
                
                const icon = button.querySelector('i');
                icon.classList.toggle('fa-chevron-down');
                icon.classList.toggle('fa-chevron-up');
            });
        });
    </script>


<script>
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Helper to show alert
function showAlert(containerId, message, type='success'){
    const alertBox = document.getElementById(containerId);
    alertBox.innerHTML = message; // allow HTML for multiple errors
    alertBox.classList.remove('hidden', 'bg-green-500', 'bg-red-500');
    alertBox.classList.add(type === 'success' ? 'bg-green-500' : 'bg-red-500');
}

// LOGIN AJAX
document.querySelector('#login-form-container form').addEventListener('submit', function(e){
    e.preventDefault();
    let email = document.getElementById('login-email').value;
    let password = document.getElementById('login-password').value;

    fetch('{{ route("ajax.login") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({email, password})
    })
    .then(async res => {
        let data = await res.json();
        // Handle validation errors
        if(res.status === 422 && data.errors){
            let messages = '';
            for(let field in data.errors){
                messages += `<div>${data.errors[field].join('<br>')}</div>`;
            }
            showAlert('login-alert', messages, 'error');
            return;
        }
        // Show success or failure
        showAlert('login-alert', data.message, data.status ? 'success' : 'error');
        if(data.status) setTimeout(() => location.reload(), 1000);
    });
});

// SIGNUP AJAX
document.querySelector('#signup-form-container form').addEventListener('submit', function(e){
    e.preventDefault();
    let email = document.getElementById('signup-email').value;
    let password = document.getElementById('signup-password').value;
    let confirm_password = document.getElementById('confirm-password').value;

    fetch('{{ route("ajax.register") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({email, password, confirm_password})
    })
    .then(async res => {
        let data = await res.json();
        // Handle validation errors
        if(res.status === 422 && data.errors){
            let messages = '';
            for(let field in data.errors){
                messages += `<div>${data.errors[field].join('<br>')}</div>`;
            }
            showAlert('signup-alert', messages, 'error');
            return;
        }
        // Show success or failure
        showAlert('signup-alert', data.message, data.status ? 'success' : 'error');
        if(data.status) setTimeout(() => location.reload(), 1000);
    });
});
</script>


</body>
</html>