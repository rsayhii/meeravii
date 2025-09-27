@extends('admin.layout')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Product Details</h2>
        <p class="text-gray-600">View product information</p>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden p-6">
        <h3 class="text-lg font-semibold mb-2">Name: <span class="font-normal">{{ $product->name }}</span></h3>
        <h3 class="text-lg font-semibold mb-2">SKU: <span class="font-normal">{{ $product->sku }}</span></h3>
        <h3 class="text-lg font-semibold mb-2">Category: <span class="font-normal">{{ $product->category->name ?? '-' }}</span></h3>
        <h3 class="text-lg font-semibold mb-2">Subcategory: <span class="font-normal">{{ $product->subCategory->name ?? '-' }}</span></h3>
        <h3 class="text-lg font-semibold mb-2">Sub-Subcategory: <span class="font-normal">{{ $product->subSubCategory->name ?? '-' }}</span></h3>
        <h3 class="text-lg font-semibold mb-2">Price: <span class="font-normal">${{ $product->price }}</span></h3>
        <h3 class="text-lg font-semibold mb-2">Discount Price: <span class="font-normal">${{ $product->discount_price ?? 'N/A' }}</span></h3>
        <h3 class="text-lg font-semibold mb-2">Stock: <span class="font-normal">{{ $product->stock }}</span></h3>
        <h3 class="text-lg font-semibold mb-2">Status: <span class="font-normal">{{ $product->status }}</span></h3>

        <h3 class="text-lg font-semibold mt-4">Description:</h3>
        <p class="mb-2">{{ $product->description ?? '-' }}</p>

        @if($product->images)
            <h3 class="text-lg font-semibold mt-4">Product Images:</h3>
            <div class="flex flex-wrap gap-2">
                @foreach($product->images as $img)
                    <img src="{{ asset('storage/' . $img) }}" class="h-24 w-24 object-cover rounded">
                @endforeach
            </div>
        @endif

    

    <!-- Variants -->
    @if($product->variants && count($product->variants))
        <h2 class="text-xl font-bold mb-4">Variants</h2>
        <div class="space-y-4">
            @foreach($product->variants as $variant)
                <div class="border rounded-lg p-4 flex items-center gap-4">
                    <!-- Color Box -->
                    <div class="w-16 h-16 rounded-full border flex items-center justify-center" 
                         style="background-color: {{ $variant['color'] ?? '#ccc' }};">
                        &nbsp;
                    </div>
                    <div class="flex-1">
                        <p><strong>Color:</strong> {{ $variant['color'] ?? '-' }}</p>
                        <p><strong>Sizes:</strong>
                            @if(isset($variant['sizes']) && is_array($variant['sizes']))
                                @foreach($variant['sizes'] as $size)
                                    <span class="inline-block bg-gray-100 px-2 py-1 rounded text-sm mr-1">
                                        {{ $size['size'] ?? '' }} ({{ $size['qty'] ?? 0 }})
                                    </span>
                                @endforeach
                            @endif
                        </p>
                        <!-- Variant Images -->
                        @if(isset($variant['images']) && count($variant['images']))
                            <div class="flex gap-2 mt-2">
                                @foreach($variant['images'] as $img)
                                    <img src="{{ asset('storage/'.$img) }}" class="w-20 h-20 object-cover rounded border">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Product Details -->
    @if($product->product_details)
        <h2 class="text-xl font-bold mt-6 mb-2">Product Details</h2>
        <ul class="list-disc list-inside bg-gray-50 p-4 rounded">
            @foreach($product->product_details as $key => $value)
                <li><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Delivery & Returns -->
    @if($product->delivery_returns)
        <h2 class="text-xl font-bold mt-6 mb-2">Delivery & Returns</h2>
        <ul class="list-disc list-inside bg-gray-50 p-4 rounded">
            @foreach($product->delivery_returns as $key => $value)
                <li><strong>{{ ucfirst(str_replace('_',' ',$key)) }}:</strong> {{ $value }}</li>
            @endforeach
        </ul>
    @endif



    </div>
</div>
@endsection
