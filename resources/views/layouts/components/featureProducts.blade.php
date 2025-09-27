<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Carousel | Fresh Off The Runway</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
           
           
        }
        .title-font {
            font-family: 'Playfair Display', serif;
        }
        .product-card {
            transition: all 0.3s ease;
           
            overflow: hidden;
            
        }
        .product-card:hover {
            transform: translateY(-5px);
            /* box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); */
        }
        .product-image1 {
            height: 400px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .product-image1::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background: linear-gradient(120deg, rgba(255,255,255,0.4) 0%, rgba(255,255,255,0.1) 100%); */
            z-index: 1;
        }
        .product-info {
            padding: 2px;
           
        }
        .owl-nav {
            position: absolute;
            top: -70px;
            right: 0;
        }
        .owl-nav button {
            width: 40px;
            height: 40px;
            border-radius: 50% !important;
            background: #556B2F !important;
            color: white !important;
            margin-left: 10px;
            transition: all 0.3s ease;
        }
        .owl-nav button:hover {
            background: #4d6523 !important;
        }
        .discount-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #556B2F;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            z-index: 10;
        }
        .view-btn {
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }
        .product-card:hover .view-btn {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="min-h-screen py-8 px-4 bg-[#fff9f2] ">
    <div class="bg-[#fff9f2] py-4">

        <div class="max-w-7xl mx-auto my-6"  >
        <!-- Header -->
        <header class="text-center mb-12">
            <h1 class="title-font text-4xl md:text-5xl font-bold text-gray-800 mb-4">Fresh Off The Runway</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Discover our latest collection of trendy co-ord sets. Each piece is carefully designed to bring elegance and style to your wardrobe.</p>
        </header>

        <!-- Carousel -->
        <div class="relative">
            <div class="owl-carousel owl-carousel1 owl-theme">


                @foreach ($product as $item)
    
                <div class="product-card">
                    <a href="{{ url("product",1) }}">
                    <div class="product-image1">
                        <span class="discount-badge">20% OFF</span>
                        {{-- <div class="text-5xl text-blue-700 opacity-20 absolute">Midnight Bloom</div> --}}
                        <img src="{{ asset('/storage/',$item->images) }}" alt="Midnight Bloom Ensemble" class="h-full  object-cover relative z-2">
                    </div>
                    <div class="product-info">
                        <h3 class="font-semibold text-sm text-gray-800">{{ $item->name }}</h3>
                        <div class="flex items-center mt-2">
                            <span class="text-sm font-light text-gray-800">₹999.00</span>
                            <span class="text-sm text-gray-500 line-through ml-2">₹1249.00</span>
                        </div>
                          
                        <button class="view-btn w-full mt-4 bg-[#556B2F] hover:bg-white hover:text-[#556B2F] text-white py-2 rounded-md">  Shop Now</button>
                    </div>
                    </a>
                </div>  
                    
                @endforeach          
                
            </div>
        </div>

    </div>

    </div>
    

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".owl-carousel1").owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 1500,
                autoplayHoverPause: false,
                responsive:{
                    0:{
                        items:1
                    },
                    250:{
                        items:2
                    },
                    300:{
                        items:3
                    },
                    750:{
                        items:4
                    }
                }
            });
        });
    </script>
</body>
</html>