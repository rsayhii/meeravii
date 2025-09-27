<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Why Choose Section</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fefaf4] text-gray-800 font-sans">

<section class="max-w-7xl mx-auto py-16 px-4 flex flex-col lg:flex-row items-start justify-between">
  <!-- Left Text Section -->
  <div class="w-full lg:w-1/2">
    <h3 class="uppercase tracking-widest text-gray-500 text-sm mb-2 text-center">Values</h3>
    <h2 class="text-4xl font-semibold mb-10 text-center">
      Why Choose <span class="text-yellow-500">Meeravii</span>
    </h2>

    <!-- Feature List -->
    <div class="space-y-8">
      @php
        $features = [
          ['title' => 'Trendsetting Designs', 'desc' => 'Ahead of the curve.'],
          ['title' => 'Sustainable Fashion', 'desc' => 'Eco-friendly choices you\'ll love.'],
          ['title' => 'Quality Craftsmanship', 'desc' => 'Garments made to last.'],
          ['title' => 'Inclusive Sizing', 'desc' => 'Fashion for every body.'],
          ['title' => 'Customer-Centric', 'desc' => 'We’re with you every step.']
        ];
      @endphp

      @foreach ($features as $index => $feature)
      <div onmouseover="showImage({{ $index }})" class="cursor-pointer">
        <div class="flex gap-6 items-start">
          <span class="text-2xl font-medium text-gray-700">{{ sprintf('%02d', $index+1) }}</span>
          <div>
            <h4 class="text-xl font-medium text-gray-700">{{ $feature['title'] }}</h4>
            <p class="text-gray-500">{{ $feature['desc'] }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- Right Image Section -->
  <div class="w-full lg:w-[30%] mt-12 lg:mt-0">
    <div class="rounded-xl overflow-hidden shadow-lg">
      <img id="productImage" src="{{ asset('assets/images/whyChoseImg/why1.jpg') }}" alt="Product Image" class="w-full h-[600px] object-cover transition-all duration-500" />
    </div>
  </div>
</section>

<script>
  const images = [
    @foreach (range(1, 5) as $i)
      "{{ asset('assets/images/whyChoseImg/why'.$i.'.jpg') }}",
    @endforeach
  ];

  function showImage(index) {
    document.getElementById("productImage").src = images[index];
  }
</script>

</body>
</html>
