<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Footer Example</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

</head>
<body >

  <!-- Footer -->
  <footer class="bg-white border-t border-gray-200 pt-12">
    <div class="max-w-7xl mx-auto px-6 py-10">

     
      <div class=" mb-10  flex flex-col md:flex-row md:justify-between md:items-center gap-6 px-4">
          <div style="font-family: 'Poppins', sans-serif;">
     <h2 class="text-3xl font-bold text-[#556B2F]">
      Join our newsletter to
     </h2>
      <p class="text-2xl  text-[#556B2F]">
      keep up to date with us!
      </p>
      </div>



      <div class="mt-6 flex justify-center">
      <div class="relative w-72">
   
       <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
         <svg xmlns="http://www.w3.org/2000/svg" 
           viewBox="0 0 24 24" fill="currentColor" 
           class="w-5 h-5">
        <path fill-rule="evenodd" 
              d="M12 2.25a4.5 4.5 0 00-4.5 4.5v.75a4.5 4.5 0 009 0V6.75a4.5 4.5 0 00-4.5-4.5zm-7.5 18a7.5 7.5 0 0115 0v.75a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75v-.75z" 
              clip-rule="evenodd" />
        </svg>
         </span>

    
       <input type="email" placeholder="Enter your email"
         class="pl-10 pr-4 py-2 rounded-full border border-gray-300 
             focus:outline-none focus:ring-2 focus:ring-green-400 w-full">
         </div>

 
       <button class="ml-3 px-6 py-2 bg-lime-500 hover:bg-lime-600 text-white rounded-full font-medium">
        Subscribe
      </button>
      </div>


    </div>

     {{-- <div class="h-1 bg-gray-200 rounded-full mt-8 mb-8"></div> --}}

      <!-- Footer main -->
      <div class="grid md:grid-cols-2 gap-8 text-sm text-gray-700  border-t pt-12">

  <!-- Logo + About -->
  <div class="pb-24">
    <div class="flex  space-x-2">
      {{-- <div class="w-6 h-6 rounded-full bg-lime-500"></div> --}}
      <div class="flex-shrink-0 flex items-center gap-4">
                    <a href="#" class="flex items-center">
                        <img class="h-16 w-auto" src="{{ asset('assets/images/logo-meeravii.png') }}" alt="Meeravii Logo">
                    </a>
                    <span class="text-2xl font-semibold text-[#556B2F]">Meeravii</span>
                </div>
    </div>
    <p class="mt-3 text-gray-600 font-semibold">
      We growing up your business with<br> personal AI manager.
    </p>
  </div>

  <!-- Platform + Company + Resources (all in one div) -->
  <div class="grid grid-cols-3 gap-8">
    <div>
      <h3 class="font-bold mb-3">Platform</h3>
      <ul class="space-y-2 font-semibold">
        <li><a href="#" class="hover:text-gray-900">Plans & Pricing</a></li>
        <li><a href="#" class="hover:text-gray-900">Personal AI Manager</a></li>
        <li><a href="#" class="hover:text-gray-900">AI Business Writer</a></li>
      </ul>
    </div>

    <div>
      <h3 class="font-bold mb-3">Company</h3>
      <ul class="space-y-2 font-semibold">
        <li><a href="#" class="hover:text-gray-900">Blog</a></li>
        <li><a href="#" class="hover:text-gray-900">Careers</a></li>
        <li><a href="#" class="hover:text-gray-900">News</a></li>
      </ul>
    </div>

    <div>
      <h3 class="font-bold mb-3">Resources</h3>
      <ul class="space-y-2 font-semibold">
        <li><a href="#" class="hover:text-gray-900">Documentation</a></li>
        <li><a href="#" class="hover:text-gray-900">Papers</a></li>
        <li><a href="#" class="hover:text-gray-900">Press Conferences</a></li>
      </ul>
    </div>
  </div>

</div>






     {{-- <div class="h-1 bg-gray-200 rounded-full mt-8 mb-8"></div> --}}

      <!-- Bottom -->
      <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-600 border-t pt-4">
        <p> © 2025 Meeravii, Inc. All rights reserved.</p>
        <div class="flex space-x-6 mt-4 md:mt-0">
          <a href="#" class="hover:text-gray-900">Terms of Service</a>
          <a href="#" class="hover:text-gray-900">Privacy Policy</a>
          <a href="#" class="hover:text-gray-900">Cookies</a>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>
