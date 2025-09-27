@extends('admin.layout')
@section('content')
       <div class="container mx-auto px-6 py-8">
                    <!-- Content sections will be loaded here -->
                    {{-- <div id="content-area"> --}}
                        <!-- Dashboard content will be loaded here -->
                        <div id="dashboard" class="content-section active">
                            <div class="mb-6">
                                <h2 class="text-2xl font-bold text-gray-800">Dashboard Overview</h2>
                                <p class="text-gray-600">Welcome back, Admin! Here's what's happening with your store today.</p>
                            </div>
                            
                            <!-- Stats Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                                <div class="bg-white rounded-lg shadow p-6">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-full bg-primary bg-opacity-10 text-primary mr-4">
                                            <i class="fas fa-shopping-cart text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-600">Total Orders</p>
                                            <h3 class="text-2xl font-bold text-gray-800">1,254</h3>
                                            <p class="text-xs text-green-500"><i class="fas fa-arrow-up mr-1"></i>12% from last week</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-white rounded-lg shadow p-6">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-full bg-primary bg-opacity-10 text-primary mr-4">
                                            <i class="fas fa-dollar-sign text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                                            <h3 class="text-2xl font-bold text-gray-800">$24,563</h3>
                                            <p class="text-xs text-green-500"><i class="fas fa-arrow-up mr-1"></i>8% from last week</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-white rounded-lg shadow p-6">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-full bg-primary bg-opacity-10 text-primary mr-4">
                                            <i class="fas fa-users text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-600">Customers</p>
                                            <h3 class="text-2xl font-bold text-gray-800">5,842</h3>
                                            <p class="text-xs text-green-500"><i class="fas fa-arrow-up mr-1"></i>5% from last week</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-white rounded-lg shadow p-6">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-full bg-primary bg-opacity-10 text-primary mr-4">
                                            <i class="fas fa-box text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-600">Products</p>
                                            <h3 class="text-2xl font-bold text-gray-800">324</h3>
                                            <p class="text-xs text-gray-500">12 low in stock</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Charts -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                                <div class="bg-white rounded-lg shadow p-6">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Revenue Overview</h3>
                                    <canvas id="revenueChart" height="300"></canvas>
                                </div>
                                
                                <div class="bg-white rounded-lg shadow p-6">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Sales by Category</h3>
                                    <canvas id="categoryChart" height="300"></canvas>
                                </div>
                            </div>
                            
                            <!-- Recent Orders -->
                            <div class="bg-white rounded-lg shadow mb-8">
                                <div class="px-6 py-4 border-b border-gray-200">
                                    <h3 class="text-lg font-medium text-gray-800">Recent Orders</h3>
                                </div>
                                <div class="divide-y divide-gray-200">
                                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 px-6 py-4 items-center">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">#ORD-12345</p>
                                            <p class="text-sm text-gray-500">Today, 10:42 AM</p>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">John Doe</p>
                                            <p class="text-sm text-gray-500">New York, USA</p>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">3 items</p>
                                            <p class="text-sm text-gray-500">$156.00</p>
                                        </div>
                                        <div>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                Processing
                                            </span>
                                        </div>
                                        <div class="text-right">
                                            <button class="text-primary hover:text-primary-dark text-sm font-medium">View Details</button>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 px-6 py-4 items-center">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">#ORD-12344</p>
                                            <p class="text-sm text-gray-500">Today, 09:15 AM</p>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">Sarah Johnson</p>
                                            <p class="text-sm text-gray-500">London, UK</p>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">2 items</p>
                                            <p class="text-sm text-gray-500">$98.50</p>
                                        </div>
                                        <div>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Completed
                                            </span>
                                        </div>
                                        <div class="text-right">
                                            <button class="text-primary hover:text-primary-dark text-sm font-medium">View Details</button>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 px-6 py-4 items-center">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">#ORD-12343</p>
                                            <p class="text-sm text-gray-500">Yesterday, 03:27 PM</p>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">Michael Brown</p>
                                            <p class="text-sm text-gray-500">Sydney, Australia</p>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">5 items</p>
                                            <p class="text-sm text-gray-500">$245.75</p>
                                        </div>
                                        <div>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                Shipped
                                            </span>
                                        </div>
                                        <div class="text-right">
                                            <button class="text-primary hover:text-primary-dark text-sm font-medium">View Details</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                                    <a href="#" class="text-primary hover:text-primary-dark text-sm font-medium">View all orders</a>
                                </div>
                            </div>
                            
                            <!-- Top Products -->
                            <div class="bg-white rounded-lg shadow">
                                <div class="px-6 py-4 border-b border-gray-200">
                                    <h3 class="text-lg font-medium text-gray-800">Top Selling Products</h3>
                                </div>
                                <div class="divide-y divide-gray-200">
                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 px-6 py-4 items-center">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-md object-cover" src="https://via.placeholder.com/40" alt="Product image">
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-gray-900">Classic White T-Shirt</p>
                                                <p class="text-sm text-gray-500">Clothing</p>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-900">234 sold</p>
                                            <p class="text-sm text-gray-500">$19.99 each</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-900">$4,677.66 revenue</p>
                                        </div>
                                        <div class="text-right">
                                            <button class="text-primary hover:text-primary-dark text-sm font-medium">View Product</button>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 px-6 py-4 items-center">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-md object-cover" src="https://via.placeholder.com/40" alt="Product image">
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-gray-900">Denim Jacket</p>
                                                <p class="text-sm text-gray-500">Outerwear</p>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-900">187 sold</p>
                                            <p class="text-sm text-gray-500">$59.99 each</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-900">$11,218.13 revenue</p>
                                        </div>
                                        <div class="text-right">
                                            <button class="text-primary hover:text-primary-dark text-sm font-medium">View Product</button>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 px-6 py-4 items-center">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-md object-cover" src="https://via.placeholder.com/40" alt="Product image">
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-gray-900">Sports Shorts</p>
                                                <p class="text-sm text-gray-500">Activewear</p>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-900">156 sold</p>
                                            <p class="text-sm text-gray-500">$24.99 each</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-900">$3,898.44 revenue</p>
                                        </div>
                                        <div class="text-right">
                                            <button class="text-primary hover:text-primary-dark text-sm font-medium">View Product</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                                    <a href="#" class="text-primary hover:text-primary-dark text-sm font-medium">View all products</a>
                                </div>
                            </div>
                        </div>
                        
                      
                        
                        <!-- Categories Page -->
                        {{-- <div id="categories" class="content-section hidden">
                            <div class="mb-6 flex justify-between items-center">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-800">Categories</h2>
                                    <p class="text-gray-600">Manage product categories and organization</p>
                                </div>
                                <button class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md flex items-center">
                                    <i class="fas fa-plus mr-2"></i> Add Category
                                </button>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-white rounded-lg shadow p-6">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Clothing</h3>
                                    <ul class="space-y-2">
                                        <li class="flex justify-between items-center">
                                            <span class="text-gray-700">T-Shirts</span>
                                            <span class="text-sm text-gray-500">42 products</span>
                                        </li>
                                        <li class="flex justify-between items-center">
                                            <span class="text-gray-700">Jeans</span>
                                            <span class="text-sm text-gray-500">28 products</span>
                                        </li>
                                        <li class="flex justify-between items-center">
                                            <span class="text-gray-700">Jackets</span>
                                            <span class="text-sm text-gray-500">19 products</span>
                                        </li>
                                        <li class="flex justify-between items-center">
                                            <span class="text-gray-700">Dresses</span>
                                            <span class="text-sm text-gray-500">31 products</span>
                                        </li>
                                    </ul>
                                    <div class="mt-4 pt-4 border-t border-gray-200 flex justify-between">
                                        <span class="text-sm text-gray-500">Total: 120 products</span>
                                        <button class="text-primary hover:text-primary-dark text-sm font-medium">Edit Category</button>
                                    </div>
                                </div>
                                
                                <div class="bg-white rounded-lg shadow p-6">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Shoes</h3>
                                    <ul class="space-y-2">
                                        <li class="flex justify-between items-center">
                                            <span class="text-gray-700">Sneakers</span>
                                            <span class="text-sm text-gray-500">24 products</span>
                                        </li>
                                        <li class="flex justify-between items-center">
                                            <span class="text-gray-700">Boots</span>
                                            <span class="text-sm text-gray-500">16 products</span>
                                        </li>
                                        <li class="flex justify-between items-center">
                                            <span class="text-gray-700">Sandals</span>
                                            <span class="text-sm text-gray-500">12 products</span>
                                        </li>
                                        <li class="flex justify-between items-center">
                                            <span class="text-gray-700">Formal</span>
                                            <span class="text-sm text-gray-500">8 products</span>
                                        </li>
                                    </ul>
                                    <div class="mt-4 pt-4 border-t border-gray-200 flex justify-between">
                                        <span class="text-sm text-gray-500">Total: 60 products</span>
                                        <button class="text-primary hover:text-primary-dark text-sm font-medium">Edit Category</button>
                                    </div>
                                </div>
                                
                                <div class="bg-white rounded-lg shadow p-6">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Accessories</h3>
                                    <ul class="space-y-2">
                                        <li class="flex justify-between items-center">
                                            <span class="text-gray-700">Bags</span>
                                            <span class="text-sm text-gray-500">18 products</span>
                                        </li>
                                        <li class="flex justify-between items-center">
                                            <span class="text-gray-700">Hats</span>
                                            <span class="text-sm text-gray-500">14 products</span>
                                        </li>
                                        <li class="flex justify-between items-center">
                                            <span class="text-gray-700">Jewelry</span>
                                            <span class="text-sm text-gray-500">22 products</span>
                                        </li>
                                        <li class="flex justify-between items-center">
                                            <span class="text-gray-700">Watches</span>
                                            <span class="text-sm text-gray-500">9 products</span>
                                        </li>
                                    </ul>
                                    <div class="mt-4 pt-4 border-t border-gray-200 flex justify-between">
                                        <span class="text-sm text-gray-500">Total: 63 products</span>
                                        <button class="text-primary hover:text-primary-dark text-sm font-medium">Edit Category</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 bg-white rounded-lg shadow p-6">
                                <h3 class="text-lg font-medium text-gray-800 mb-4">Add New Category</h3>
                                <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary" placeholder="Enter category name">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Parent Category</label>
                                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary">
                                            <option>No parent category</option>
                                            <option>Clothing</option>
                                            <option>Shoes</option>
                                            <option>Accessories</option>
                                        </select>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                        <textarea rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-primary" placeholder="Enter category description"></textarea>
                                    </div>
                                    <div class="md:col-span-2 flex justify-end">
                                        <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Cancel</button>
                                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Add Category</button>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                        
                        <!-- Other content sections would be added here -->
                        <div id="inventory" class="content-section hidden">
                            <!-- Inventory content would go here -->
                        </div>
                        
                        <div id="all-orders" class="content-section hidden">
                            <!-- All Orders content would go here -->
                        </div>
                        
                        <!-- More sections would be added similarly -->
                    {{-- </div> --}}
                </div>
@endsection
    
