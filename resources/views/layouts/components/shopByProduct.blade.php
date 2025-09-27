<section class="bg-[#fff9f2] py-12">
  <div class="max-w-7xl mx-auto px-4">
    <!-- Heading -->
    <h2 class="text-center text-xl md:text-2xl font-semibold tracking-widest text-orange-500 mb-10">
      SHOP BY CATEGORIES
    </h2>

    <!-- Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
    @foreach($category as $item)
    <div class="relative overflow-hidden rounded-t-[300px] rounded-b-2xl shadow-md group">
       <img src="{{ asset('storage/' . $item->image) }}" 
     alt="{{ $item->name }}" 
     class="w-full h-[400px] object-cover transition-transform duration-500 group-hover:scale-105" />

        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 w-[85%]">
            <button class="w-full bg-[#556B2F] text-white py-2 px-4 flex items-center justify-between rounded-lg font-medium hover:bg-white hover:text-[#556B2F]">
                {{ $item->name }}
                <span class="ml-2">&rarr;</span>
            </button>
        </div>
    </div>
    @endforeach
</div>
  </div>
</section>
