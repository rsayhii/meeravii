    <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <!-- Left side -->
                    <div class="flex items-center">
                        <!-- Mobile menu button -->
                        <button id="mobile-menu-button" class="lg:hidden p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        
                        <!-- Search bar -->
                        <div class="ml-4 flex-1 min-w-0">
                            <div class="relative max-w-md">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input type="text" id="global-search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-gray-50 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-primary focus:border-primary" placeholder="Search products, orders, customers...">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right side -->
                    <div class="flex items-center space-x-4">
                        <!-- Language/Currency switcher -->
                        <div class="relative">
                            <select class="appearance-none bg-gray-50 border border-gray-300 rounded-md px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-primary">
                                <option>EN / USD</option>
                                <option>FR / EUR</option>
                                <option>DE / EUR</option>
                            </select>
                        </div>
                        
                        <!-- Notifications -->
                        <div class="relative">
                            <button id="notifications-button" class="p-2 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-primary rounded-md">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute -top-1 -right-1 h-4 w-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                            </button>
                            
                            <!-- Notifications dropdown -->
                            <div id="notifications-dropdown" class="absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200 hidden">
                                <div class="px-4 py-2 text-sm font-medium text-gray-700 border-b border-gray-200">
                                    Notifications (3)
                                </div>
                                <div class="max-h-64 overflow-y-auto">
                                    <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 border-b border-gray-100">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-shopping-cart text-primary"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">New order received</p>
                                                <p class="text-sm text-gray-500">Order #12345 - $156.00</p>
                                                <p class="text-xs text-gray-400">5 minutes ago</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 border-b border-gray-100">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-exclamation-triangle text-yellow-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">Low stock alert</p>
                                                <p class="text-sm text-gray-500">Blue Jeans - Only 3 left</p>
                                                <p class="text-xs text-gray-400">1 hour ago</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-user text-green-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">New customer registered</p>
                                                <p class="text-sm text-gray-500">John Doe joined</p>
                                                <p class="text-xs text-gray-400">2 hours ago</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="px-4 py-2 text-center border-t border-gray-200">
                                    <a href="#" class="text-sm text-primary hover:text-primary-dark">View all notifications</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- User profile -->
                        <div class="relative">
                            <button id="user-menu-button" class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-primary">
                                <div class="flex items-center">
                                    <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin&background=556b2f&color=fff" alt="Admin">
                                    <span class="ml-2 text-sm font-medium text-gray-700 hidden sm:block">Admin User</span>
                                    <i class="fas fa-chevron-down ml-1 text-xs text-gray-400"></i>
                                </div>
                            </button>
                            
                            <!-- User dropdown -->
                            <div id="user-dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200 hidden">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    <i class="fas fa-user mr-2"></i>Profile
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    <i class="fas fa-cog mr-2"></i>Settings
                                </a>
                                <div class="border-t border-gray-100"></div>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Sign out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>