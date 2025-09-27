<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestsellers Section</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="bg-[#fff9f2]">
    <div class="bg-[#fff9f2]">

    

    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-12 md:py-16 grid grid-cols-1 md:grid-cols-3 gap-8 items-center ">

        <!-- Left Content -->
        <div class="md:col-span-1 text-center md:text-left">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 md:mb-6 leading-snug text-[#3f5745]">Shop Our<br> Bestsellers</h2>
            <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">
                Discover the charm of our most coveted designs, inspired by timeless traditions
                and crafted to elevate your everyday elegance. Your perfect style awaits!
            </p>
            <a href="#" class="text-[#3f5745] font-medium hover:underline text-sm md:text-base">Shop All →</a>
        </div>

        <!-- Right Swiper Slider -->
        <div class="md:col-span-2 relative overflow-visible">
            <div class="swiper mySwiper my-5">
                <div class="swiper-wrapper">

                    <!-- Product 1 -->
                    <div class="swiper-slide py-4">
                         <a href="{{ url("product",9) }}">
                        <div
                            class="bg-white rounded-2xl overflow-hidden shadow-sm relative group transition duration-300 hover:shadow-lg">
                            <span
                                class="absolute top-3 left-3 bg-yellow-100 text-gray-800 text-xs px-2 py-1 rounded z-20">Sale</span>
                            <button class="absolute top-3 right-3 text-gray-400 hover:text-pink-500 ">❤</button>

                            <div class="relative">
                               
                                <img src="{{asset ('assets/images/bestSeller/bestseller1.jpg')}}" alt="Product 1"
                                    class="w-full h-[300px] sm:h-[380px] md:h-[450px] object-cover transition-transform duration-500 group-hover:scale-105">
                                <!-- Quick View -->
                                <div
                                    class="absolute bottom-3 left-0 right-0 flex justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                    <button
                                        class="bg-[#3f5745] text-white text-xs sm:text-sm w-[180px] sm:w-[220px] py-2 rounded-2xl shadow-lg">
                                        Quick view
                                    </button>


                                </div>
                                </a>
                            </div>

                            <div class="p-3 sm:p-4">
                                <h3 class="text-gray-800 font-medium text-sm sm:text-base max-w-xs truncate">Ganga Red
                                    Floral Print Cotton Top</h3>
                                <div class="mt-2 flex items-center space-x-2">
                                    <span class="text-green-600 font-bold text-xs sm:text-sm">₹ 979.00</span>
                                    <span class="text-gray-400 line-through text-xs sm:text-sm">₹ 1,895.00</span>
                                    <span
                                        class="bg-gray-100 text-gray-700 text-[10px] sm:text-xs px-2 py-1 rounded">-48%</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>

                    <!-- Product 2 -->
                    <div class="swiper-slide py-4">
                         <a href="{{ url("product",10) }}">
                        <div
                            class="bg-white rounded-2xl overflow-hidden shadow-sm relative group transition duration-300 hover:shadow-lg">
                            <span
                                class="absolute top-3 left-3 bg-yellow-100 text-gray-800 text-xs px-2 py-1 rounded z-20">Sale</span>
                            <button class="absolute top-3 right-3 text-gray-400 hover:text-pink-500">❤</button>

                            <div class="relative">
                                <img src="{{asset ('assets/images/bestSeller/bestseller2.jpg')}}" alt="Product 2"
                                    class="w-full h-[300px] sm:h-[380px] md:h-[450px] object-cover transition-transform duration-500 group-hover:scale-105">
                                <div
                                    class="absolute bottom-3 left-0 right-0 flex justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                    <button
                                        class="bg-[#3f5745] text-white text-xs sm:text-sm w-[180px] sm:w-[220px] py-2 rounded-2xl shadow-lg">
                                        Quick view
                                    </button>
                                </div>
                            </div>

                            <div class="p-3 sm:p-4">
                                <h3 class="text-gray-800 font-medium text-sm sm:text-base max-w-xs truncate">Green
                                    Cotton Printed Kurti Dress</h3>
                                <div class="mt-2 flex items-center space-x-2">
                                    <span class="text-green-600 font-bold text-xs sm:text-sm">₹ 2,249.00</span>
                                    <span class="text-gray-400 line-through text-xs sm:text-sm">₹ 2,679.00</span>
                                    <span
                                        class="bg-gray-100 text-gray-700 text-[10px] sm:text-xs px-2 py-1 rounded">-16%</span>
                                </div>
                            </div>
                        </div>
                         </a>
                    </div>

                    <!-- Product 3 -->
                    <div class="swiper-slide py-4">
                         <a href="{{ url("product",11) }}">
                        <div
                            class="bg-white rounded-2xl overflow-hidden shadow-sm relative group transition duration-300 hover:shadow-lg">
                            <span
                                class="absolute top-3 left-3 bg-gray-200 text-gray-600 text-xs px-2 py-1 rounded z-20">Sold
                                Out</span>
                            <button class="absolute top-3 right-3 text-gray-400 hover:text-pink-500">❤</button>

                            <div class="relative">
                                <img src="{{asset ('assets/images/bestSeller/bestseller3.jpg')}}" alt="Product 3"
                                    class="w-full h-[300px] sm:h-[380px] md:h-[450px] object-cover transition-transform duration-500 group-hover:scale-105">
                                <div
                                    class="absolute bottom-3 left-0 right-0 flex justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                    <button
                                        class="bg-[#3f5745] text-white text-xs sm:text-sm w-[180px] sm:w-[220px] py-2 rounded-2xl shadow-lg">
                                        Quick view
                                    </button>
                                </div>
                            </div>

                            <div class="p-3 sm:p-4">
                                <h3 class="text-gray-800 font-medium text-sm sm:text-base max-w-xs truncate">Green
                                    Printed Afghani Chogha Set</h3>
                                <div class="mt-2 flex items-center space-x-2">
                                    <span class="text-green-600 font-bold text-xs sm:text-sm">₹ 1,999.00</span>
                                    <span class="text-gray-400 line-through text-xs sm:text-sm">₹ 2,499.00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>

                    <!-- Product 4 -->
                    <div class="swiper-slide py-4">
                         <a href="{{ url("product",12) }}">
                        <div
                            class="bg-white rounded-2xl overflow-hidden shadow-sm relative group transition duration-300 hover:shadow-lg">
                            <span
                                class="absolute top-3 left-3 bg-yellow-100 text-gray-800 text-xs px-2 py-1 rounded z-20">Sale</span>
                            <button class="absolute top-3 right-3 text-gray-400 hover:text-pink-500">❤</button>

                            <div class="relative">
                                <img src="{{asset ('assets/images/bestSeller/bestseller4.jpg')}}" alt="Product 4"
                                    class="w-full h-[300px] sm:h-[380px] md:h-[450px] object-cover transition-transform duration-500 group-hover:scale-105">
                                <div
                                    class="absolute bottom-3 left-0 right-0 flex justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                    <button
                                        class="bg-[#3f5745] text-white text-xs sm:text-sm w-[180px] sm:w-[220px] py-2 rounded-2xl shadow-lg">
                                        Quick view
                                    </button>
                                </div>
                            </div>

                            <div class="p-3 sm:p-4">
                                <h3 class="text-gray-800 font-medium text-sm sm:text-base max-w-xs truncate">Elegant
                                    Blue Ethnic Kurta Set</h3>
                                <div class="mt-2 flex items-center space-x-2">
                                    <span class="text-green-600 font-bold text-xs sm:text-sm">₹ 1,499.00</span>
                                    <span class="text-gray-400 line-through text-xs sm:text-sm">₹ 1,899.00</span>
                                    <span
                                        class="bg-gray-100 text-gray-700 text-[10px] sm:text-xs px-2 py-1 rounded">-21%</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>

                    <!-- Product 5 -->
                    <div class="swiper-slide py-4">
                         <a href="{{ url("product",13) }}">
                        <div
                            class="bg-white rounded-2xl overflow-hidden shadow-sm relative group transition duration-300 hover:shadow-lg">
                            <span
                                class="absolute top-3 left-3 bg-yellow-100 text-gray-800 text-xs px-2 py-1 rounded z-20">Sale</span>
                            <button class="absolute top-3 right-3 text-gray-400 hover:text-pink-500">❤</button>

                            <div class="relative">
                                <img src="{{asset ('assets/images/bestSeller/bestseller5.jpg')}}" alt="Product 5"
                                    class="w-full h-[300px] sm:h-[380px] md:h-[450px] object-cover transition-transform duration-500 group-hover:scale-105">
                                <div
                                    class="absolute bottom-3 left-0 right-0 flex justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                    <button
                                        class="bg-[#3f5745] text-white text-xs sm:text-sm w-[180px] sm:w-[220px] py-2 rounded-2xl shadow-lg">
                                        Quick view
                                    </button>
                                </div>
                            </div>

                            <div class="p-3 sm:p-4">
                                <h3 class="text-gray-800 font-medium text-sm sm:text-base max-w-xs truncate">Trendy
                                    Printed Summer Dress</h3>
                                <div class="mt-2 flex items-center space-x-2">
                                    <span class="text-green-600 font-bold text-xs sm:text-sm">₹ 1,199.00</span>
                                    <span class="text-gray-400 line-through text-xs sm:text-sm">₹ 1,599.00</span>
                                    <span
                                        class="bg-gray-100 text-gray-700 text-[10px] sm:text-xs px-2 py-1 rounded">-25%</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>

                </div>

                <!-- ✅ Custom Swiper Buttons -->
                <div
                    class="custom-swiper-button custom-swiper-button-prev absolute left-0 sm:-left-0 top-1/2 transform -translate-y-1/2 bg-white rounded-full shadow-md sm:shadow-lg w-8 h-8 sm:w-12 sm:h-12 flex items-center justify-center hover:bg-[#3f5745] transition z-20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-6 sm:h-6 text-black hover:text-white"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>

                <div
                    class="custom-swiper-button custom-swiper-button-next absolute right-0 sm:-right-0 top-1/2 transform -translate-y-1/2 bg-white rounded-full shadow-md sm:shadow-lg w-8 h-8 sm:w-12 sm:h-12 flex items-center justify-center hover:bg-[#3f5745] transition z-20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-6 sm:h-6 text-black hover:text-white"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>

            </div>
        </div>
    </section>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 15,
            navigation: {
                nextEl: ".custom-swiper-button-next",
                prevEl: ".custom-swiper-button-prev",
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            loop: true,
            breakpoints: {
                640: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            }
        });
    </script>

</body>

</html>