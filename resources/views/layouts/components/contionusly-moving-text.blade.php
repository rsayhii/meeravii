<!-- Infinite Scrolling Text Section -->
<section class="bg-[#fff9f2] py-6 overflow-hidden">
  <div class="relative w-full">
    <!-- Scrolling container -->
    <div class="flex whitespace-nowrap animate-scroll">
      <p class="mx-8 text-lg md:text-4xl font-medium text-[#556B2F]">
         Elegant Dresses
      </p>
      <p class="mx-8 text-lg md:text-4xl font-medium text-[#556B2F]">
         Comfortable Lounge Wear
      </p>
      <p class="mx-8 text-lg md:text-4xl font-medium text-[#556B2F]">
         Stylish Co-Ord Sets
      </p>
      <p class="mx-8 text-lg md:text-4xl font-medium text-[#556B2F]">
         Natural & Neutral Shades
      </p>
      <p class="mx-8 text-lg md:text-4xl font-medium text-[#556B2F]">
         Fashion for Every Occasion
      </p>
      <!-- duplicate for seamless loop -->
      <p class="mx-8 text-lg md:text-4xl font-medium text-[#556B2F]">
         Elegant Dresses
      </p>
      <p class="mx-8 text-lg md:text-4xl font-medium text-[#556B2F]">
         Comfortable Lounge Wear
      </p>
      <p class="mx-8 text-lg md:text-4xl font-medium text-[#556B2F]">
         Stylish Co-Ord Sets
      </p>
      <p class="mx-8 text-lg md:text-4xl font-medium text-[#556B2F]">
         Natural & Neutral Shades
      </p>
      <p class="mx-8 text-lg md:text-4xl font-medium text-[#556B2F]">
         Fashion for Every Occasion
      </p>
    </div>
  </div>
</section>

<!-- Tailwind custom animation -->
<style>
@keyframes scroll {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}
.animate-scroll {
  display: flex;
  animation: scroll 25s linear infinite;
  width: max-content;
}
</style>
