<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order - Heteran Glow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        premiumBlack: '#1a1a1a',
                        premiumWhite: '#f8f8f8',
                        accentGray: '#4a4a4a',
                        lightGray: '#e5e5e5'
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f8f8;
        }
        
        .step-indicator {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 2rem;
        }
        
        .step-indicator::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: #e5e5e5;
            transform: translateY(-50%);
            z-index: 1;
        }
        
        .step {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: white;
            border: 1px solid #e5e5e5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            position: relative;
            z-index: 2;
        }
        
        .step.active {
            background-color: #1a1a1a;
            color: white;
            border-color: #1a1a1a;
        }
        
        .step-label {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            margin-top: 8px;
            font-size: 0.75rem;
            white-space: nowrap;
        }
        
        .cart-item {
            transition: all 0.3s ease;
        }
        
        .cart-item:hover {
            background-color: #f5f5f5;
        }
        
        .summary-card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .card-form {
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        
        .card-form.visible {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        
        .payment-option {
            transition: all 0.2s ease;
        }
        
        .payment-option.selected {
            border-color: #1a1a1a;
            background-color: #f8f8f8;
        }
        
        @media (max-width: 768px) {
            .step-label {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-premiumWhite text-premiumBlack">
    <!-- Header -->
    @include('layouts.header')

    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <!-- Step Indicator -->
        <div class="step-indicator mb-12">
            <div class="step active">
                <span>1</span>
                <span class="step-label">Cart</span>
            </div>
            <div class="step">
                <span>2</span>
                <span class="step-label">Address</span>
            </div>
            <div class="step">
                <span>3</span>
                <span class="step-label">Payment</span>
            </div>
            <div class="step">
                <span>4</span>
                <span class="step-label">Review</span>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Column - Form Sections -->
            <div class="w-full lg:w-2/3">
                <!-- Cart Review Section -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-6 border-b border-lightGray pb-3">Cart Review</h2>
                    
                    <div class="cart-item flex items-center py-4 border-b border-lightGray">
                        <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center ">
                            {{-- <span class="text-xs text-accentGray">Product Image</span> --}}
                             <img class="h-full w-full object-cover rounded" src="{{ asset('assets/images/featureProducts/product1.jpeg') }}" alt="Meeravii Logo">
                        </div>
                        <div class="ml-4 flex-grow">
                            <h3 class="font-medium">Heteran Glow C+ Serum</h3>
                            <p class="text-sm text-accentGray">Size: 30ml • Color: Original</p>
                            <p class="font-semibold mt-1">₹1,799</p>
                        </div>
                        <div class="flex items-center">
                            <button class="w-8 h-8 rounded-full border border-lightGray flex items-center justify-center">
                                <i class="fas fa-minus text-xs"></i>
                            </button>
                            <span class="mx-3 font-medium">1</span>
                            <button class="w-8 h-8 rounded-full border border-lightGray flex items-center justify-center">
                                <i class="fas fa-plus text-xs"></i>
                            </button>
                        </div>
                        <button class="ml-4 text-accentGray hover:text-premiumBlack">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="flex justify-between items-center mt-6">
                        <div class="text-sm text-accentGray">Items: 1</div>
                        <div class="font-semibold">Subtotal: ₹1,799</div>
                    </div>
                </div>

                <!-- Delivery Address Section -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-6 border-b border-lightGray pb-3">Delivery Address</h2>
                    
                    <div class="mb-6">
                        <div class="flex items-start mb-4">
                            <input type="radio" name="address" id="home-address" class="mt-1 mr-3" checked>
                            <label for="home-address" class="flex-grow">
                                <p class="font-medium">Home Address</p>
                                <p class="text-sm text-accentGray">John Doe • +91 9876543210</p>
                                <p class="text-sm">123, Main Street, Bangalore, Karnataka - 560001</p>
                            </label>
                            <div class="flex space-x-2">
                                <button class="text-sm text-accentGray hover:text-premiumBlack">Edit</button>
                                <button class="text-sm text-accentGray hover:text-premiumBlack">Delete</button>
                            </div>
                        </div>
                        
                        <div class="flex items-start mb-4">
                            <input type="radio" name="address" id="work-address" class="mt-1 mr-3">
                            <label for="work-address" class="flex-grow">
                                <p class="font-medium">Work Address</p>
                                <p class="text-sm text-accentGray">John Doe • +91 9876543210</p>
                                <p class="text-sm">456, Tech Park, Electronic City, Bangalore, Karnataka - 560100</p>
                            </label>
                            <div class="flex space-x-2">
                                <button class="text-sm text-accentGray hover:text-premiumBlack">Edit</button>
                                <button class="text-sm text-accentGray hover:text-premiumBlack">Delete</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-4 border-t border-lightGray">
                        <h3 class="font-medium mb-4">Add New Address</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Full Name</label>
                                <input type="text" class="w-full px-4 py-2 border border-lightGray rounded-md focus:outline-none focus:ring-1 focus:ring-premiumBlack">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Mobile Number</label>
                                <input type="tel" class="w-full px-4 py-2 border border-lightGray rounded-md focus:outline-none focus:ring-1 focus:ring-premiumBlack">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Pincode</label>
                                <input type="text" class="w-full px-4 py-2 border border-lightGray rounded-md focus:outline-none focus:ring-1 focus:ring-premiumBlack">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">City</label>
                                <input type="text" class="w-full px-4 py-2 border border-lightGray rounded-md focus:outline-none focus:ring-1 focus:ring-premiumBlack">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">State</label>
                                <select class="w-full px-4 py-2 border border-lightGray rounded-md focus:outline-none focus:ring-1 focus:ring-premiumBlack">
                                    <option>Select State</option>
                                    <option>Karnataka</option>
                                    <option>Maharashtra</option>
                                    <option>Tamil Nadu</option>
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium mb-1">Address Line</label>
                                <textarea class="w-full px-4 py-2 border border-lightGray rounded-md focus:outline-none focus:ring-1 focus:ring-premiumBlack" rows="2"></textarea>
                            </div>
                        </div>
                        <button class="mt-4 px-6 py-2 bg-premiumBlack text-white rounded-md hover:bg-opacity-90">Save Address</button>
                    </div>
                </div>

                <!-- Delivery Method -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-6 border-b border-lightGray pb-3">Delivery Method</h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <input type="radio" name="delivery" id="standard-delivery" class="mt-1 mr-3" checked>
                            <label for="standard-delivery" class="flex-grow">
                                <p class="font-medium">Standard Delivery</p>
                                <p class="text-sm text-accentGray">Free</p>
                                <p class="text-sm mt-1">Estimated delivery: 3-5 business days</p>
                            </label>
                        </div>
                        
                        <div class="flex items-start">
                            <input type="radio" name="delivery" id="express-delivery" class="mt-1 mr-3">
                            <label for="express-delivery" class="flex-grow">
                                <p class="font-medium">Express Delivery</p>
                                <p class="text-sm text-accentGray">+ ₹150</p>
                                <p class="text-sm mt-1">Estimated delivery: 1-2 business days</p>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Payment Options -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-6 border-b border-lightGray pb-3">Payment Options</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="payment-option border border-lightGray rounded-md p-4 hover:border-premiumBlack cursor-pointer" data-method="cod">
                            <div class="flex items-center">
                                <input type="radio" name="payment" id="cod" class="mr-3">
                                <label for="cod" class="font-medium">Cash on Delivery</label>
                            </div>
                        </div>
                        
                        <div class="payment-option border border-lightGray rounded-md p-4 hover:border-premiumBlack cursor-pointer" data-method="card">
                            <div class="flex items-center mb-2">
                                <input type="radio" name="payment" id="card" class="mr-3">
                                <label for="card" class="font-medium">Credit/Debit Card</label>
                            </div>
                            <div class="flex space-x-2 ml-6">
                                <i class="fab fa-cc-visa text-accentGray"></i>
                                <i class="fab fa-cc-mastercard text-accentGray"></i>
                                <i class="fab fa-cc-amex text-accentGray"></i>
                            </div>
                        </div>
                        
                        <div class="payment-option border border-lightGray rounded-md p-4 hover:border-premiumBlack cursor-pointer" data-method="upi">
                            <div class="flex items-center mb-2">
                                <input type="radio" name="payment" id="upi" class="mr-3">
                                <label for="upi" class="font-medium">UPI</label>
                            </div>
                            <div class="flex space-x-2 ml-6">
                                <i class="fas fa-mobile-alt text-accentGray"></i>
                            </div>
                        </div>
                        
                        <div class="payment-option border border-lightGray rounded-md p-4 hover:border-premiumBlack cursor-pointer" data-method="netbanking">
                            <div class="flex items-center mb-2">
                                <input type="radio" name="payment" id="netbanking" class="mr-3">
                                <label for="netbanking" class="font-medium">Net Banking</label>
                            </div>
                            <div class="flex space-x-2 ml-6">
                                <i class="fas fa-university text-accentGray"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Form (shown when card is selected) -->
                    <div class="card-form mt-6 pt-4 border-t border-lightGray" id="card-form">
                        <h3 class="font-medium mb-4">Card Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium mb-1">Card Number</label>
                                <input type="text" class="w-full px-4 py-2 border border-lightGray rounded-md focus:outline-none focus:ring-1 focus:ring-premiumBlack" placeholder="1234 5678 9012 3456">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Expiry Date</label>
                                <input type="text" class="w-full px-4 py-2 border border-lightGray rounded-md focus:outline-none focus:ring-1 focus:ring-premiumBlack" placeholder="MM/YY">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">CVV</label>
                                <input type="text" class="w-full px-4 py-2 border border-lightGray rounded-md focus:outline-none focus:ring-1 focus:ring-premiumBlack" placeholder="123">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium mb-1">Cardholder Name</label>
                                <input type="text" class="w-full px-4 py-2 border border-lightGray rounded-md focus:outline-none focus:ring-1 focus:ring-premiumBlack" placeholder="John Doe">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Order Summary -->
            <div class="w-full lg:w-1/3">
                <div class="sticky top-4 summary-card bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold mb-6 border-b border-lightGray pb-3">Order Summary</h2>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between">
                            <span class="text-accentGray">Subtotal (1 item)</span>
                            <span>₹1,799</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-accentGray">Shipping</span>
                            <span class="text-green-600">FREE</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-accentGray">Taxes</span>
                            <span>₹324</span>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">Apply Coupon</label>
                        <div class="flex">
                            <input type="text" class="flex-grow px-4 py-2 border border-lightGray rounded-l-md focus:outline-none focus:ring-1 focus:ring-premiumBlack" placeholder="Enter code">
                            <button class="px-4 py-2 bg-premiumBlack text-white rounded-r-md hover:bg-opacity-90">Apply</button>
                        </div>
                    </div>
                    
                    <div class="flex justify-between text-lg font-semibold border-t border-lightGray pt-4 mb-6">
                        <span>Total</span>
                        <span>₹2,123</span>
                    </div>
                    
                    <button class="w-full py-3 bg-premiumBlack text-white rounded-md hover:bg-opacity-90 font-medium">
                        Place Order - ₹2,123
                    </button>
                    
                    <p class="text-xs text-accentGray mt-4 text-center">By placing your order, you agree to our <a href="#" class="underline">Terms of Service</a> and <a href="#" class="underline">Privacy Policy</a>.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sticky Mobile Order Button -->
    <div class="lg:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-lightGray p-4 shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-accentGray">Total</p>
                <p class="text-lg font-semibold">₹2,123</p>
            </div>
            <button class="px-6 py-3 bg-premiumBlack text-white rounded-md hover:bg-opacity-90 font-medium">
                Place Order
            </button>
        </div>
    </div>

    <!-- Confirmation Popup -->
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden" id="confirmation-popup">
        <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-check text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold">Order Placed Successfully!</h3>
                <p class="text-accentGray mt-2">Your order has been confirmed</p>
            </div>
            
            <div class="bg-gray-50 rounded-lg p-4 mb-6">
                <p class="text-sm text-accentGray">Order ID</p>
                <p class="font-medium">HG123456789</p>
            </div>
            
            <div class="flex space-x-3">
                <button class="flex-1 py-2 border border-premiumBlack rounded-md font-medium">Continue Shopping</button>
                <button class="flex-1 py-2 bg-premiumBlack text-white rounded-md font-medium">Track Order</button>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        // Quantity control functionality
        const minusBtn = document.querySelector('.fa-minus').closest('button');
        const plusBtn = document.querySelector('.fa-plus').closest('button');
        const quantityEl = document.querySelector('.cart-item .mx-3');
        const subtotalEl = document.querySelector('.flex.justify-between.items-center .font-semibold');
        const totalEls = document.querySelectorAll('.text-lg.font-semibold span:last-child');
        const mobileTotalEl = document.querySelector('.lg\\:hidden .text-lg');
        
        let quantity = 1;
        const price = 1799;
        const tax = 324;
        
        function updateTotals() {
            const subtotal = quantity * price;
            const total = subtotal + tax;
            
            subtotalEl.textContent = `₹${subtotal.toLocaleString()}`;
            totalEls.forEach(el => {
                el.textContent = `₹${total.toLocaleString()}`;
            });
            mobileTotalEl.textContent = `₹${total.toLocaleString()}`;
            
            // Update the place order button text
            document.querySelectorAll('button:contains("Place Order")').forEach(btn => {
                btn.textContent = `Place Order - ₹${total.toLocaleString()}`;
            });
        }
        
        minusBtn.addEventListener('click', () => {
            if (quantity > 1) {
                quantity--;
                quantityEl.textContent = quantity;
                updateTotals();
            }
        });
        
        plusBtn.addEventListener('click', () => {
            quantity++;
            quantityEl.textContent = quantity;
            updateTotals();
        });
        
        // Place order button functionality
        const placeOrderBtn = document.querySelector('.w-full.py-3');
        const confirmationPopup = document.getElementById('confirmation-popup');
        
        placeOrderBtn.addEventListener('click', () => {
            confirmationPopup.classList.remove('hidden');
            confirmationPopup.classList.add('flex');
        });
        
        // Close popup when clicking outside
        confirmationPopup.addEventListener('click', (e) => {
            if (e.target === confirmationPopup) {
                confirmationPopup.classList.add('hidden');
                confirmationPopup.classList.remove('flex');
            }
        });

        // Payment method selection functionality
        const paymentOptions = document.querySelectorAll('.payment-option');
        const cardForm = document.getElementById('card-form');
        
        paymentOptions.forEach(option => {
            option.addEventListener('click', function() {
                // Update radio button
                const radio = this.querySelector('input[type="radio"]');
                radio.checked = true;
                
                // Remove selected class from all options
                paymentOptions.forEach(opt => {
                    opt.classList.remove('selected');
                });
                
                // Add selected class to clicked option
                this.classList.add('selected');
                
                // Show/hide card form based on selection
                if (this.dataset.method === 'card') {
                    cardForm.classList.add('visible');
                } else {
                    cardForm.classList.remove('visible');
                }
            });
        });

        // Also handle direct clicks on radio buttons
        document.querySelectorAll('input[name="payment"]').forEach(radio => {
            radio.addEventListener('click', function() {
                // Find parent payment option
                const parentOption = this.closest('.payment-option');
                
                // Remove selected class from all options
                paymentOptions.forEach(opt => {
                    opt.classList.remove('selected');
                });
                
                // Add selected class to clicked option
                parentOption.classList.add('selected');
                
                // Show/hide card form based on selection
                if (this.id === 'card') {
                    cardForm.classList.add('visible');
                } else {
                    cardForm.classList.remove('visible');
                }
            });
        });
    </script>
</body>
</html>