<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Structured Ottoman Jumper - ETIO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body class="bg-white">
    @include('layouts.header')

    <!-- Breadcrumb -->
    <div class="container mx-auto px-4 py-4 breadcrumb">
        <span>Home</span> > <span>New In</span> > <span>New In Women's</span> > <span>{{ $product['name'] }}</span>
    </div>

    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-10 justify-center">
            <!-- Product Images -->
            <div class="lg:w-1/3">
                <div class="relative mb-4 overflow-hidden">
                    <img id="main-product-image" src="{{ asset($product['image']) }}" alt="Structured Ottoman Jumper" class="w-full h-[600px] product-image object-cover">
                    <button id="zoom-btn" class="absolute bottom-4 right-4 bg-white p-2 rounded-full shadow-md">
                        <i class="fas fa-search-plus"></i>
                    </button>
                </div>
                
                <!-- Thumbnail Gallery -->
                <div class="grid grid-cols-4 gap-2">
                    <div class="cursor-pointer border rounded overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=200&q=80" 
                             alt="Front view" class="w-full h-20 object-cover" data-image="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80">
                    </div>
                    <div class="cursor-pointer border rounded overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=200&q=80" 
                             alt="Side view" class="w-full h-20 object-cover" data-image="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80">
                    </div>
                    <div class="cursor-pointer border rounded overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=200&q=80" 
                             alt="Back view" class="w-full h-20 object-cover" data-image="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80">
                    </div>
                    <div class="cursor-pointer border rounded overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=200&q=80" 
                             alt="Detail view" class="w-full h-20 object-cover" data-image="https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80">
                    </div>
                </div>
                
                <!-- Sustainability Info -->
                <div class="mt-6 p-4 bg-gray-50 rounded">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-leaf text-green-600 mr-2"></i>
                        <h3 class="font-medium">Sustainable Choice</h3>
                    </div>
                    <p class="text-sm text-gray-600">This product is made with responsibly sourced materials and produced under fair working conditions.</p>
                </div>
            </div>

            <!-- Product Info -->
            <div class="lg:w-1/2">
                <h1 class="text-2xl font-light mb-2">{{ $product['name'] }}</h1>
                <p class="text-sm text-gray-500 mb-6">ETIO</p>
                
                <div class="mb-6">
                    <span class="text-sm text-gray-500">ITEM: 107235</span>
                </div>
                
                <div class="mb-6">
                    <p class="text-gray-700">This jumper is crafted from a wool and viscose blend with a slight stretch to help maintain shape and aid recovery when worn. The soft A-line silhouette...</p>
                    <button id="read-more-btn" class="text-sm font-medium mt-2">READ MORE</button>
                    <div id="full-description" class="mt-2 text-gray-700 hidden">
                        <p class="mb-2">The soft A-line silhouette, coupled with the subtle texture of the multi-directional antenna rib, gives this style a contemporary and flattering fit.</p>
                        <p>The slightly soft handle of the viscose blend gives a modern touch to this sweater.</p>
                    </div>
                </div>
                
                <div class="mb-6">
                    <h3 class="text-sm font-medium mb-2">COLOUR: <span class="font-normal" id="selected-color">PUTTY</span></h3>
                    <div class="flex space-x-2">
                        <div class="color-swatch selected w-8 h-8 rounded-full border" 
                             style="background-color: #f0e6d2" data-color="Putty"></div>
                        <div class="color-swatch w-8 h-8 rounded-full border" 
                             style="background-color: #2c3e50" data-color="Navy"></div>
                        <div class="color-swatch w-8 h-8 rounded-full border" 
                             style="background-color: #7f8c8d" data-color="Grey"></div>
                    </div>
                </div>
                
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-sm font-medium">SELECT SIZE</h3>
                        <button id="size-guide-btn" class="text-sm underline">SIZE GUIDE</button>
                    </div>
                    <div class="grid grid-cols-5 gap-2">
                        <div class="size-option" data-size="XS">XS</div>
                        <div class="size-option" data-size="S">S</div>
                        <div class="size-option selected" data-size="M">M</div>
                        <div class="size-option" data-size="L">L</div>
                        <div class="size-option" data-size="XL">XL</div>
                    </div>
                </div>
                
                <div class="mb-6">
                    <button class="w-full bg-black text-white py-3 px-4 mb-3">ADD TO BAG</button>
                    <button class="w-full border border-black text-black py-3 px-4 flex items-center justify-center">
                        <i class="far fa-heart mr-2"></i> ADD TO WISH LIST
                    </button>
                </div>
                
                <div class="mb-6">
                    <button class="w-full border border-gray-300 py-3 px-4 flex items-center justify-center">
                        <i class="fas fa-store mr-2"></i> CHECK STORE STOCK
                    </button>
                </div>
                
                <div class="text-sm text-gray-500 mb-8">
                    <p>Protocols or town</p>
                </div>
                
                <!-- Product Details Accordion -->
                <div class="border-t border-gray-200 pt-0">
                    <div class="accordion-item border-b border-gray-200">
                        <button class="accordion-btn w-full flex justify-between items-center py-4 text-left">
                            <span class="font-medium">PRODUCT DETAILS</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="accordion-content">
                            <div class="pb-4">
                                <h3 class="font-medium mb-2">DESCRIPTION</h3>
                                <p class="text-gray-700 mb-4">This jumper is crafted from a wool and viscose blend with a slight stretch to help maintain shape and aid recovery when worn. The soft A-line silhouette, coupled with the subtle texture of the multi-directional antenna rib, gives this style a contemporary and flattering fit. The slightly soft handle of the viscose blend gives a modern touch to this sweater.</p>
                                
                                <h3 class="font-medium mb-2">FIT AND FEATURES</h3>
                                <ul class="text-gray-700 list-disc pl-5 mb-4">
                                    <li>True to size</li>
                                    <li>Model is 5'10" and wearing a size S</li>
                                    <li>Side neck point to hem for a size M measures oden</li>
                                    <li>Contemporary fit</li>
                                    <li>A-line silhouette</li>
                                    <li>Round neckline</li>
                                    <li>Multi-directional antenna rib detailing</li>
                                </ul>
                                
                                <h3 class="font-medium mb-2">FABRIC AND CARE</h3>
                                <p class="text-gray-700 mb-2">59% Wool, 18% Viscose, 15% Polyamide, 7% Polyester, 1% Elastane</p>
                                <p class="text-gray-700">Gentle Machine Wash</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-b border-gray-200">
                        <button class="accordion-btn w-full flex justify-between items-center py-4 text-left">
                            <span class="font-medium">DELIVERY & RETURNS</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="accordion-content">
                            <div class="pb-4">
                                <h3 class="font-medium mb-2">FREE CLICK & COLLECT</h3>
                                <p class="text-gray-700 mb-4">Order online and pick up your items from one of our stores for free.</p>
                                
                                <h3 class="font-medium mb-2">DELIVERY OPTIONS</h3>
                                <ul class="text-gray-700 list-disc pl-5 mb-4">
                                    <li>Standard Delivery: £3.99 (3-5 working days)</li>
                                    <li>Next Day Delivery: £5.99 (order before 10pm)</li>
                                    <li>Free Delivery on orders over £50</li>
                                </ul>
                                
                                <h3 class="font-medium mb-2">RETURNS</h3>
                                <p class="text-gray-700">We offer free returns within 28 days of purchase. Items must be unworn with original tags attached.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Sticky Add to Cart Bar (Mobile) -->
    <div class="sticky-cart-bar fixed bottom-0 left-0 right-0 bg-white border-t p-4 flex justify-between items-center lg:hidden">
        <div>
            <p class="font-medium">Structured Ottoman Jumper</p>
            <p class="text-sm text-gray-600">£89</p>
        </div>
        <button class="bg-black text-white py-2 px-6">ADD TO BAG</button>
    </div>

    <!-- Size Guide Modal -->
    <div id="size-guide-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg w-11/12 md:w-2/3 max-w-2xl max-h-screen overflow-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold">Size Guide</h3>
                    <button id="close-size-guide" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="mb-6">
                    <h4 class="font-medium mb-2">Women's Clothing Sizes</h4>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2">Size</th>
                                    <th class="px-4 py-2">UK</th>
                                    <th class="px-4 py-2">Bust (in)</th>
                                    <th class="px-4 py-2">Waist (in)</th>
                                    <th class="px-4 py-2">Hips (in)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b">
                                    <td class="px-4 py-2 font-medium">XS</td>
                                    <td class="px-4 py-2">6</td>
                                    <td class="px-4 py-2">32"</td>
                                    <td class="px-4 py-2">25"</td>
                                    <td class="px-4 py-2">35"</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="px-4 py-2 font-medium">S</td>
                                    <td class="px-4 py-2">8</td>
                                    <td class="px-4 py-2">34"</td>
                                    <td class="px-4 py-2">27"</td>
                                    <td class="px-4 py-2">37"</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="px-4 py-2 font-medium">M</td>
                                    <td class="px-4 py-2">10</td>
                                    <td class="px-4 py-2">36"</td>
                                    <td class="px-4 py-2">29"</td>
                                    <td class="px-4 py-2">39"</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="px-4 py-2 font-medium">L</td>
                                    <td class="px-4 py-2">12</td>
                                    <td class="px-4 py-2">38"</td>
                                    <td class="px-4 py-2">31"</td>
                                    <td class="px-4 py-2">41"</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 font-medium">XL</td>
                                    <td class="px-4 py-2">14</td>
                                    <td class="px-4 py-2">40"</td>
                                    <td class="px-4 py-2">33"</td>
                                    <td class="px-4 py-2">43"</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="mt-6">
                    <h4 class="font-medium mb-2">How to Measure</h4>
                    <ul class="list-disc pl-5 space-y-2">
                        <li><strong>Bust:</strong> Measure around the fullest part of your bust, keeping the tape horizontal</li>
                        <li><strong>Waist:</strong> Measure around the narrowest part of your waist (usually just above the navel)</li>
                        <li><strong>Hips:</strong> Measure around the fullest part of your hips, about 8 inches below your waist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.components.recommendedProducts')

    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image Zoom functionality
            const mainImage = document.getElementById('main-product-image');
            const zoomBtn = document.getElementById('zoom-btn');
            
            zoomBtn.addEventListener('click', function() {
                mainImage.classList.toggle('zoomed');
                if (mainImage.classList.contains('zoomed')) {
                    zoomBtn.innerHTML = '<i class="fas fa-search-minus"></i>';
                } else {
                    zoomBtn.innerHTML = '<i class="fas fa-search-plus"></i>';
                }
            });
            
            // Image gallery selection
            const galleryImages = document.querySelectorAll('.grid img');
            galleryImages.forEach(img => {
                img.addEventListener('click', function() {
                    const newSrc = this.getAttribute('data-image');
                    mainImage.setAttribute('src', newSrc);
                });
            });
            
            // Color selection
            const colorSwatches = document.querySelectorAll('.color-swatch');
            const selectedColorText = document.getElementById('selected-color');
            
            colorSwatches.forEach(swatch => {
                swatch.addEventListener('click', function() {
                    const color = this.getAttribute('data-color');
                    selectedColorText.textContent = color;
                    
                    // Update active swatch
                    colorSwatches.forEach(s => s.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });
            
            // Size selection
            const sizeOptions = document.querySelectorAll('.size-option');
            
            sizeOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const size = this.getAttribute('data-size');
                    
                    // Update active size
                    sizeOptions.forEach(o => o.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });
            
            // Read more functionality
            const readMoreBtn = document.getElementById('read-more-btn');
            const fullDescription = document.getElementById('full-description');
            
            readMoreBtn.addEventListener('click', function() {
                fullDescription.classList.toggle('hidden');
                if (fullDescription.classList.contains('hidden')) {
                    readMoreBtn.textContent = 'READ MORE';
                } else {
                    readMoreBtn.textContent = 'SHOW LESS';
                }
            });
            
            // Accordion functionality
            const accordionButtons = document.querySelectorAll('.accordion-btn');
            
            accordionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('i');
                    
                    content.classList.toggle('open');
                    
                    if (content.classList.contains('open')) {
                        icon.classList.replace('fa-chevron-down', 'fa-chevron-up');
                    } else {
                        icon.classList.replace('fa-chevron-up', 'fa-chevron-down');
                    }
                });
            });
            
            // Size guide modal
            const sizeGuideBtn = document.getElementById('size-guide-btn');
            const sizeGuideModal = document.getElementById('size-guide-modal');
            const closeSizeGuide = document.getElementById('close-size-guide');
            
            sizeGuideBtn.addEventListener('click', function() {
                sizeGuideModal.classList.remove('hidden');
            });
            
            closeSizeGuide.addEventListener('click', function() {
                sizeGuideModal.classList.add('hidden');
            });
            
            // Sticky cart bar on scroll
            const stickyCartBar = document.querySelector('.sticky-cart-bar');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    stickyCartBar.classList.remove('hidden');
                } else {
                    stickyCartBar.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>