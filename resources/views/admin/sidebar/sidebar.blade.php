 <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="flex items-center justify-center h-16 px-4 border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                            <i class="fas fa-tshirt text-white text-xl"></i>
                        </div>
                        <span class="ml-2 text-xl font-bold text-gray-800">ClothingHub</span>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="flex-1 px-4 py-4 overflow-y-auto sidebar-scroll">
                    <ul class="space-y-2">
                        <!-- Dashboard -->


       @php
    $dashboardActive = request()->routeIs('dashboard.index');
@endphp

                       <li>
    <a href="{{ route('dashboard.index') }}" 
       class="nav-item flex items-center px-4 py-2 text-sm font-medium rounded-lg
       {{ $dashboardActive ? 'text-primary bg-gray-100' : 'text-gray-700 hover:bg-gray-50' }}">
        <i class="fas fa-chart-line mr-3"></i>
        Dashboard
    </a>
</li>


                  @php
    // Check if any of the product routes are active
    $productActive = request()->routeIs('admin-product.*');
@endphp
                        
                        <!-- Products -->
                        <li>
                            <div class="nav-group">
                                <button class="nav-toggle w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg  {{ $productActive ? 'text-primary bg-gray-100' : 'text-gray-700 hover:bg-gray-50' }}">
                                    <div class="flex items-center">
                                        <i class="fas fa-box mr-3"></i>
                                        Products
                                    </div>
                                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                                </button>
                                <div class="nav-submenu ml-6 mt-2 space-y-1 hidden {{ $productActive ? '' : 'hidden' }}">
                                    <a href="{{ route('admin-product.index') }}" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg {{ request()->routeIs('admin-product.index') ? 'text-primary bg-gray-100' : 'text-gray-600 hover:bg-gray-50' }}">All Products</a>
                                    <a href="{{ route('admin-product.create') }}"  class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg {{ request()->routeIs('admin-product.create') ? 'text-primary bg-gray-100' : 'text-gray-600 hover:bg-gray-50' }}">Add Product</a>
                                    <a href="{{ route('admin-category.index') }}" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg {{ request()->routeIs('admin-product.category') ? 'text-primary bg-gray-100' : 'text-gray-600 hover:bg-gray-50' }}">Categories</a>
                                    <a href="#" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Inventory</a>
                                </div>
                            </div>
                        </li>
                        
                        <!-- Orders -->
                        <li>
                            <div class="nav-group">
                                <button class="nav-toggle w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-shopping-cart mr-3"></i>
                                        Orders
                                    </div>
                                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                                </button>
                                <div class="nav-submenu ml-6 mt-2 space-y-1 hidden">
                                    <a href="#" data-section="all-orders" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">All Orders</a>
                                    <a href="#" data-section="returns" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Returns/Exchanges</a>
                                    <a href="#" data-section="order-tracking" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Order Tracking</a>
                                </div>
                            </div>
                        </li>
                        
                        <!-- Customers -->
                        <li>
                            <div class="nav-group">
                                <button class="nav-toggle w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-users mr-3"></i>
                                        Customers
                                    </div>
                                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                                </button>
                                <div class="nav-submenu ml-6 mt-2 space-y-1 hidden">
                                    <a href="#" data-section="customer-list" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Customer List</a>
                                    <a href="#" data-section="customer-groups" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Customer Groups</a>
                                </div>
                            </div>
                        </li>
                        
                        <!-- Sales & Revenue -->
                        <li>
                            <div class="nav-group">
                                <button class="nav-toggle w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-chart-bar mr-3"></i>
                                        Sales & Revenue
                                    </div>
                                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                                </button>
                                <div class="nav-submenu ml-6 mt-2 space-y-1 hidden">
                                    <a href="#" data-section="sales-overview" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Sales Overview</a>
                                    <a href="#" data-section="revenue-reports" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Revenue Reports</a>
                                </div>
                            </div>
                        </li>
                        
                        <!-- Marketing -->
                        <li>
                            <div class="nav-group">
                                <button class="nav-toggle w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-bullhorn mr-3"></i>
                                        Marketing
                                    </div>
                                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                                </button>
                                <div class="nav-submenu ml-6 mt-2 space-y-1 hidden">
                                    <a href="#" data-section="promotions" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Promotions</a>
                                    <a href="#" data-section="email-campaigns" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Email Campaigns</a>
                                    <a href="#" data-section="affiliate" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Affiliate Marketing</a>
                                </div>
                            </div>
                        </li>
                        
                        <!-- Analytics -->
                        <li>
                            <div class="nav-group">
                                <button class="nav-toggle w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-chart-pie mr-3"></i>
                                        Analytics
                                    </div>
                                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                                </button>
                                <div class="nav-submenu ml-6 mt-2 space-y-1 hidden">
                                    <a href="#" data-section="site-traffic" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Site Traffic</a>
                                    <a href="#" data-section="customer-behavior" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Customer Behavior</a>
                                </div>
                            </div>
                        </li>
                        
                        <!-- Settings -->
                        <li>
                            <div class="nav-group">
                                <button class="nav-toggle w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-cog mr-3"></i>
                                        Settings
                                    </div>
                                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                                </button>
                                <div class="nav-submenu ml-6 mt-2 space-y-1 hidden">
                                    <a href="#" data-section="general-settings" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">General Settings</a>
                                    <a href="#" data-section="payment-settings" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Payment Settings</a>
                                    <a href="#" data-section="shipping-settings" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Shipping Settings</a>
                                </div>
                            </div>
                        </li>
                        
                        <!-- Support -->
                        <li>
                            <div class="nav-group">
                                <button class="nav-toggle w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-life-ring mr-3"></i>
                                        Support
                                    </div>
                                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                                </button>
                                <div class="nav-submenu ml-6 mt-2 space-y-1 hidden">
                                    <a href="#" data-section="faqs" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">FAQs</a>
                                    <a href="#" data-section="contact-messages" class="nav-item block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Contact Messages</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>