<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wishlist</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      background-color: white;
      color: black;
      font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }
  </style>
</head>
<body>

  @include('layouts.header')

  <main class="container mx-auto px-24 py-8">
    <div class="text-center my-8">
      <h1 class="text-4xl font-light">Wishlist</h1>
      <p class="text-sm text-gray-600 mt-2">Home / Wishlist</p>
    </div>

    <div class="overflow-x-auto shadow-md rounded-lg">
      <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
            <th scope="col" class="py-3 px-6">Product</th>
            <th scope="col" class="py-3 px-6">Price</th>
            <th scope="col" class="py-3 px-6">Date Added</th>
            <th scope="col" class="py-3 px-6">Stock Status</th>
            <th scope="col" class="py-3 px-6"></th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-white border-b">
            <td class="py-4 px-6 flex items-center">
              <i class="fas fa-times-circle text-gray-400 cursor-pointer mr-4"></i>
              <img src="{{asset ('assets/images/bestSeller/bestseller1.jpg')}}" alt="HydraLuxe Serum" class="w-16 h-16 object-cover rounded mr-4">
              <div>
                <div class="font-semibold text-black">HydraLuxe Serum</div>
                <div class="text-gray-500">Skincare</div>
              </div>
            </td>
            <td class="py-4 px-6 text-black">₹1990.00</td>
            <td class="py-4 px-6">18 January 2025</td>
            <td class="py-4 px-6 text-green-600">In stock</td>
            <td class="py-4 px-6 text-right">
              <button class="bg-black text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-800">Add to Cart</button>
            </td>
          </tr>
          <tr class="bg-white border-b">
            <td class="py-4 px-6 flex items-center">
              <i class="fas fa-times-circle text-gray-400 cursor-pointer mr-4"></i>
              <img src="{{asset ('assets/images/bestSeller/bestseller2.jpg')}}" alt="HydraLuxe Serum" class="w-16 h-16 object-cover rounded mr-4">
              <div>
                <div class="font-semibold text-black">SilkSkin Serum</div>
                <div class="text-gray-500">Skincare</div>
              </div>
            </td>
            <td class="py-4 px-6 text-black">₹2090.00</td>
            <td class="py-4 px-6">17 January 2025</td>
            <td class="py-4 px-6 text-green-600">In stock</td>
            <td class="py-4 px-6 text-right">
              <button class="bg-black text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-800">Add to Cart</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center mt-4">
      <div class="flex items-center space-x-2">
        {{-- <span class="text-sm">Wishlist link:</span>
        <input type="text" value="https://example.com" class="border p-2 rounded-lg text-sm w-48" readonly>
        <button class="bg-black text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-800">Copy Link</button> --}}
      </div>
      <div class="flex space-x-2 mt-4 md:mt-0">
        <button class="bg-white text-black border border-black px-4 py-2 rounded-lg text-sm hover:bg-gray-100">Clear Wishlist</button>
        <button class="bg-black text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-800">Add All to Cart</button>
      </div>
    </div>

    <div class="grid md:grid-cols-3 gap-8 text-center my-16">
      <div class="flex flex-col items-center">
        <div class="text-4xl">📦</div>
        <h3 class="font-semibold text-lg mt-2">Free Shipping</h3>
        <p class="text-sm text-gray-600">Free shipping for order above $50</p>
      </div>
      <div class="flex flex-col items-center">
        <div class="text-4xl">💳</div>
        <h3 class="font-semibold text-lg mt-2">Flexible Payment</h3>
        <p class="text-sm text-gray-600">Multiple secure payment options</p>
      </div>
      <div class="flex flex-col items-center">
        <div class="text-4xl">📞</div>
        <h3 class="font-semibold text-lg mt-2">24x7 Support</h3>
        <p class="text-sm text-gray-600">We support online all days.</p>
      </div>
    </div>
    
    {{-- <div class="text-center py-16 bg-gray-100 rounded-lg">
      <h2 class="text-xl">Our Newsletter</h2>
      <h3 class="text-3xl font-light mt-2">Subscribe to Our Newsletter to <br><span class="font-semibold">Get Updates on Our Latest Offers</span></h3>
      <p class="text-sm text-gray-600 mt-4">Get 25% off on your first order just by subscribing to our newsletter</p>
      <div class="flex justify-center mt-6">
        <input type="email" placeholder="Enter Email Address" class="border border-gray-300 p-3 rounded-l-lg w-64 focus:outline-none focus:border-black">
        <button class="bg-black text-white px-6 py-3 rounded-r-lg font-semibold hover:bg-gray-800">Subscribe</button>
      </div>
    </div> --}}
  </main>

  @include('layouts.footer')

</body>
</html>