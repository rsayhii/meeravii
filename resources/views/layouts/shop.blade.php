<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
       
        .text-brown {
            color: #7d7a74;
        }
        .mega-menu {
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
            visibility: hidden;
            opacity: 0;
            pointer-events: none;
        }
        .mega-menu.active {
            visibility: visible;
            opacity: 1;
            pointer-events: auto;
        }
    </style>
</head>
<body class="bg-white relative">

    <!-- Header -->
   @include('layouts.header')

    <!-- Hero Section -->
    <div class="w-full h-60 bg-gray-200  relative flex items-center justify-center overflow-hidden">
        {{-- <img src="https://images.unsplash.com/photo-1571068936306-6556e9e4f526?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Hero Image" class="w-full h-full object-cover absolute top-0 left-0 opacity-80"> --}}
        <h1 class="text-4xl font-light text-black tracking-widest z-10">PRODUCTS</h1>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-12 py-8">
        <div class="flex items-center text-xs text-gray-500 mb-6 space-x-1">
            <span>HOME</span>
            <span class="text-xs">&#8250;</span>
            <span class="font-semibold">PRODUCTS</span>
        </div>

        <div class="flex flex-col md:flex-row space-x-0 md:space-x-8">
            <!-- Sidebar -->
            <aside class="w-full md:w-1/4 mb-8 md:mb-0">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-3">CATEGORIES</h2>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex justify-between items-center group cursor-pointer hover:text-gray-900 transition-colors">
                            <span class="text-brown">All</span>
                            <span class="text-gray-400 text-xs">(29)</span>
                        </li>
                        <li class="flex justify-between items-center group cursor-pointer hover:text-gray-900 transition-colors">
                            <span class="text-brown">T-shirt</span>
                            <span class="text-gray-400 text-xs">(29)</span>
                        </li>
                        <li class="flex justify-between items-center group cursor-pointer hover:text-gray-900 transition-colors">
                            <span class="text-brown">Pants</span>
                            <span class="text-gray-400 text-xs">(29)</span>
                        </li>
                        <li class="flex justify-between items-center group cursor-pointer hover:text-gray-900 transition-colors">
                            <span class="text-brown">Shorts</span>
                            <span class="text-gray-400 text-xs">(29)</span>
                        </li>
                        <li class="flex justify-between items-center group cursor-pointer hover:text-gray-900 transition-colors">
                            <span class="text-brown">Dress</span>
                            <span class="text-gray-400 text-xs">(29)</span>
                        </li>
                        <li class="flex justify-between items-center group cursor-pointer hover:text-gray-900 transition-colors">
                            <span class="text-brown">Beachwear</span>
                            <span class="text-gray-400 text-xs">(29)</span>
                        </li>
                        <li class="flex justify-between items-center group cursor-pointer hover:text-gray-900 transition-colors">
                            <span class="text-brown">Jumpsuits</span>
                            <span class="text-gray-400 text-xs">(29)</span>
                        </li>
                        <li class="flex justify-between items-center group cursor-pointer hover:text-gray-900 transition-colors">
                            <span class="text-brown">Bags</span>
                            <span class="text-gray-400 text-xs">(29)</span>
                        </li>
                        <li class="flex justify-between items-center group cursor-pointer hover:text-gray-900 transition-colors">
                            <span class="text-brown">Accessories</span>
                            <span class="text-gray-400 text-xs">(29)</span>
                        </li>
                    </ul>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-3">COLORS</h2>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 rounded-full bg-red-500 border border-gray-300"></div>
                            <span class="text-brown">Purple</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 rounded-full bg-green-500 border border-gray-300"></div>
                            <span class="text-brown">Green</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 rounded-full bg-yellow-500 border border-gray-300"></div>
                            <span class="text-brown">Black</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 rounded-full bg-gray-900 border border-gray-300"></div>
                            <span class="text-brown">Black</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 rounded-full bg-yellow-500 border border-gray-300"></div>
                            <span class="text-brown">Yellow</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 rounded-full bg-blue-500 border border-gray-300"></div>
                            <span class="text-brown">Red</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 rounded-full bg-gray-400 border border-gray-300"></div>
                            <span class="text-brown">Gray</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 rounded-full bg-white border border-gray-300"></div>
                            <span class="text-brown">White</span>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-3">PRICE</h2>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <div class="relative w-1/2">
                            <span class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400">₹</span>
                            <input type="text" value="15" class="w-full pl-6 py-1 border border-gray-300 rounded-md text-center">
                        </div>
                        <span>-</span>
                        <div class="relative w-1/2">
                            <span class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400">₹</span>
                            <input type="text" value="150" class="w-full pl-6 py-1 border border-gray-300 rounded-md text-center">
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-3">SIZE</h2>
                    <div class="flex flex-wrap gap-2 text-sm">
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-200 transition-colors">S</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-200 transition-colors">M</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-200 transition-colors">L</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-200 transition-colors">XL</button>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-3">BRAND</h2>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex justify-between items-center group cursor-pointer hover:text-gray-900 transition-colors">
                            <span class="text-brown">Zara</span>
                            <span class="text-gray-400 text-xs">(19)</span>
                        </li>
                        <li class="flex justify-between items-center group cursor-pointer hover:text-gray-900 transition-colors">
                            <span class="text-brown">Mango</span>
                            <span class="text-gray-400 text-xs">(22)</span>
                        </li>
                        <li class="flex justify-between items-center group cursor-pointer hover:text-gray-900 transition-colors">
                            <span class="text-brown">H&M</span>
                            <span class="text-gray-400 text-xs">(14)</span>
                        </li>
                        <li class="flex justify-between items-center group cursor-pointer hover:text-gray-900 transition-colors">
                            <span class="text-brown">Versace</span>
                            <span class="text-gray-400 text-xs">(9)</span>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Product Grid -->
            <div class="w-full md:w-3/4">
                <div class="flex items-center justify-between text-xs text-gray-600 mb-6">
                    <div class="flex items-center space-x-2">
                        <button class="hover:text-gray-900 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </button>
                        <button class="text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <span class="ml-4">Sort By:</span>
                        <select class="border-b border-gray-400 focus:outline-none">
                            <option>Bestselling</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span>234 Items</span>
                        <div class="w-px h-4 bg-gray-300"></div>
                        <span>View:</span>
                        <select class="border-b border-gray-400 focus:outline-none">
                            <option>12 &nbsp; | &nbsp; 20 &nbsp; | &nbsp; 28</option>
                        </select>
                        <div class="w-px h-4 bg-gray-300"></div>
                        <a href="#" class="w-6 h-6 rounded-md flex items-center justify-center border border-gray-300 hover:bg-gray-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <a href="#" class="w-6 h-6 rounded-md flex items-center justify-center border border-gray-300 hover:bg-gray-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <div class="group relative">
                         <a href="{{ url("product",1) }}">
                        <div class="relative w-full h-80 bg-gray-200 overflow-hidden rounded-md">
                            <img src="{{ asset('assets/images/featureProducts/product1.jpeg') }}" alt="Product Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-2 left-2 text-xs text-white font-semibold bg-gray-900 px-2 py-1 rounded-md">NEW</span>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-sm font-semibold text-gray-900">TOP WITH RINGS AND SIDE VENTS</p>
                            <p class="text-sm text-gray-600 mt-1">₹49.90</p>
                        </div>
                         </a>
                    </div>
                    <div class="group relative">
                         <a href="{{ url("product",2) }}">
                        <div class="relative w-full h-80 bg-gray-200 overflow-hidden rounded-md">
                            <img src="{{ asset('assets/images/featureProducts/product2.jpeg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-2 left-2 text-xs text-white font-semibold bg-gray-900 px-2 py-1 rounded-md">NEW</span>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-sm font-semibold text-gray-900">FRILLY DRESS</p>
                            <p class="text-sm text-gray-600 mt-1">₹49.90</p>
                        </div>
                         </a>
                    </div>
                    <div class="group relative">
                         <a href="{{ url("product",3) }}">
                        <div class="relative w-full h-80 bg-gray-200 overflow-hidden rounded-md">
                            <img src="{{ asset('assets/images/featureProducts/product3.jpeg') }}" alt="Product Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-sm font-semibold text-gray-900">EMBROIDERED BODYSUIT</p>
                            <p class="text-sm text-gray-600 mt-1">₹49.90</p>
                        </div>
                         </a>
                    </div>
                    <div class="group relative">
                         <a href="{{ url("product",4) }}">
                        <div class="relative w-full h-80 bg-gray-200 overflow-hidden rounded-md">
                            <img src="{{ asset('assets/images/featureProducts/product4.jpeg') }}" alt="Product Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-2 left-2 text-xs text-white font-semibold bg-red-500 px-2 py-1 rounded-md">SALE</span>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-sm font-semibold text-gray-900">CORSET TOP</p>
                            <p class="text-sm text-gray-600 mt-1"><span class="line-through text-gray-400">₹59.90</span> ₹49.90</p>
                        </div>
                         </a>
                    </div>
                    <div class="group relative">
                         <a href="{{ url("product",5) }}">
                        <div class="relative w-full h-80 bg-gray-200 overflow-hidden rounded-md">
                            <img src="{{ asset('assets/images/featureProducts/product5.jpeg') }}" alt="Product Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-sm font-semibold text-gray-900">EMBROIDERED LINEN SHIRT</p>
                            <p class="text-sm text-gray-600 mt-1">₹49.90</p>
                        </div>
                         </a>
                    </div>
                    <div class="group relative">
                         <a href="{{ url("product",6) }}">
                        <div class="relative w-full h-80 bg-gray-200 overflow-hidden rounded-md">
                            <img src="{{ asset('assets/images/featureProducts/product6.jpeg') }}" alt="Product Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-sm font-semibold text-gray-900">TROPICAL PRINT DRESS</p>
                            <p class="text-sm text-gray-600 mt-1">₹59.90</p>
                        </div>
                         </a>
                    </div>
                    <div class="group relative">
                         <a href="{{ url("product",7) }}">
                        <div class="relative w-full h-80 bg-gray-200 overflow-hidden rounded-md">
                            <img src="{{ asset('assets/images/featureProducts/product7.jpeg') }}" alt="Product Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-sm font-semibold text-gray-900">FLORAL PRINT TOP</p>
                            <p class="text-sm text-gray-600 mt-1">₹59.90</p>
                        </div>
                         </a>
                    </div>
                    <div class="group relative">
                         <a href="{{ url("product",8) }}">
                        <div class="relative w-full h-80 bg-gray-200 overflow-hidden rounded-md">
                            <img src="{{ asset('assets/images/featureProducts/product8.jpeg') }}" alt="Product Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-sm font-semibold text-gray-900">FLORAL PRINT BODYSUIT</p>
                            <p class="text-sm text-gray-600 mt-1">₹49.90</p>
                        </div>
                         </a>
                    </div>
                    <div class="group relative">
                         <a href="{{ url("product",1) }}">
                        <div class="relative w-full h-80 bg-gray-200 overflow-hidden rounded-md">
                            <img src="{{ asset('assets/images/featureProducts/product1.jpeg') }}" alt="Product Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-sm font-semibold text-gray-900">FLORAL PRINT CROSSOVER JUMPSUIT</p>
                            <p class="text-sm text-gray-600 mt-1">₹69.90</p>
                        </div>
                         </a>
                    </div>
                    <div class="group relative">
                         <a href="{{ url("product",2) }}">
                        <div class="relative w-full h-80 bg-gray-200 overflow-hidden rounded-md">
                            <img src="{{ asset('assets/images/featureProducts/product2.jpeg') }}" alt="Product Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-sm font-semibold text-gray-900">FRILLY DRESS</p>
                            <p class="text-sm text-gray-600 mt-1">₹49.90</p>
                        </div>
                         </a>
                    </div>
                    <div class="group relative">
                         <a href="{{ url("product",3) }}">
                        <div class="relative w-full h-80 bg-gray-200 overflow-hidden rounded-md">
                            <img src="{{ asset('assets/images/featureProducts/product3.jpeg') }}" alt="Product Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-sm font-semibold text-gray-900">EMBROIDERED BODYSUIT</p>
                            <p class="text-sm text-gray-600 mt-1">₹49.90</p>
                        </div>
                         </a>
                    </div>
                    <div class="group relative">
                         <a href="{{ url("product",4) }}">
                        <div class="relative w-full h-80 bg-gray-200 overflow-hidden rounded-md">
                            <img src="{{ asset('assets/images/featureProducts/product4.jpeg') }}" alt="Product Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-sm font-semibold text-gray-900">FLORAL PRINT BODYSUIT</p>
                            <p class="text-sm text-gray-600 mt-1">₹49.90</p>
                        </div>
                         </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-center space-x-2 mt-8 text-sm">
            <a href="#" class="w-8 h-8 rounded-full flex items-center justify-center border border-gray-300 hover:bg-gray-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <a href="#" class="w-8 h-8 rounded-full bg-gray-900 text-white flex items-center justify-center">1</a>
            <a href="#" class="w-8 h-8 rounded-full flex items-center justify-center border border-gray-300 hover:bg-gray-200 transition-colors">2</a>
            <a href="#" class="w-8 h-8 rounded-full flex items-center justify-center border border-gray-300 hover:bg-gray-200 transition-colors">3</a>
            <a href="#" class="w-8 h-8 rounded-full flex items-center justify-center border border-gray-300 hover:bg-gray-200 transition-colors">4</a>
            <a href="#" class="w-8 h-8 rounded-full flex items-center justify-center border border-gray-300 hover:bg-gray-200 transition-colors">5</a>
            <a href="#" class="w-8 h-8 rounded-full flex items-center justify-center border border-gray-300 hover:bg-gray-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </main>

   @include('layouts.footer')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Mega Menu Logic
            const clothesMenu = document.getElementById('clothes-menu');
            const accessoriesMenu = document.getElementById('accessories-menu');
            const megaMenuClothes = document.getElementById('mega-menu-clothes');
            const megaMenuAccessories = document.getElementById('mega-menu-accessories');
            const megaMenuImageClothes = document.getElementById('mega-menu-image-clothes');
            const megaMenuImageAccessories = document.getElementById('mega-menu-image-accessories');

            function handleMegaMenu(menuTrigger, megaMenu, megaMenuImage) {
                menuTrigger.addEventListener('mouseenter', () => megaMenu.classList.add('active'));
                menuTrigger.addEventListener('mouseleave', () => megaMenu.classList.remove('active'));

                const links = megaMenu.querySelectorAll('a');
                links.forEach(link => {
                    link.addEventListener('mouseenter', () => {
                        const newImageSrc = link.getAttribute('data-image');
                        if (newImageSrc) {
                            megaMenuImage.src = newImageSrc;
                        }
                    });
                });
            }

            handleMegaMenu(clothesMenu, megaMenuClothes, megaMenuImageClothes);
            handleMegaMenu(accessoriesMenu, megaMenuAccessories, megaMenuImageAccessories);
        });
    </script>
</body>
</html>