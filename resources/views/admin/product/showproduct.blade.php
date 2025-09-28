@extends('admin.layout')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Product Details</h2>
        <p class="text-gray-600">View product information</p>
    </div>

    <div class="bg-white rounded-lg shadow-lg overflow-hidden p-6 space-y-6">
        <!-- Basic Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h3 class="text-sm font-medium text-gray-500">Name</h3>
                <p class="text-lg font-semibold text-gray-800">{{ $product->name }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">SKU</h3>
                <p class="text-lg font-semibold text-gray-800">{{ $product->sku }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Category</h3>
                <p class="text-lg font-semibold text-gray-800">{{ $product->category->name ?? '-' }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Subcategory</h3>
                <p class="text-lg font-semibold text-gray-800">{{ $product->subCategory->name ?? '-' }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Sub-Subcategory</h3>
                <p class="text-lg font-semibold text-gray-800">{{ $product->subSubCategory->name ?? '-' }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Price</h3>
                <p class="text-lg font-semibold text-green-600">${{ $product->price }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Discount Price</h3>
                <p class="text-lg font-semibold text-red-500">
                    {{ $product->discount_price ? '$'.$product->discount_price : 'N/A' }}
                </p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Stock</h3>
                <p class="text-lg font-semibold text-gray-800">{{ $product->stock }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Status</h3>
                <span class="px-3 py-1 text-sm rounded-full 
                    {{ $product->status == 'Active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ $product->status }}
                </span>
            </div>
        </div>

        <!-- Description -->
        <div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Description</h3>
            <p class="text-gray-600">{{ $product->description ?? '-' }}</p>
        </div>

        <!-- Images -->
        @if($product->images)
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Product Images</h3>
                <div class="flex flex-wrap gap-3">
                    @foreach($product->images as $img)
                        <img src="{{ asset('storage/' . $img) }}" 
                             class="h-28 w-28 object-cover rounded-lg shadow">
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Variants -->
        @if($product->variants && count($product->variants))
            <div>
                <h2 class="text-xl font-bold mb-4">Variants</h2>
                <div class="grid gap-4">
                    @foreach($product->variants as $variant)
                        <div class="border rounded-lg p-4 bg-gray-50">
                            <div class="flex items-center gap-4">
                                <!-- Color Circle -->
                                <div class="w-12 h-12 rounded-full border" 
                                     style="background-color: {{ $variant['color'] ?? '#ccc' }};">
                                </div>
                                <div>
                                    <p><strong>Color:</strong> {{ $variant['color'] ?? '-' }}</p>
                                    <p><strong>Sizes:</strong>
                                        @if(isset($variant['sizes']) && is_array($variant['sizes']))
                                            @foreach($variant['sizes'] as $size)
                                                <span class="inline-block bg-white border px-2 py-1 rounded text-sm mr-1">
                                                    {{ $size['size'] ?? '' }} ({{ $size['qty'] ?? 0 }})
                                                </span>
                                            @endforeach
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <!-- Variant Images -->
                            @if(isset($variant['images']) && count($variant['images']))
                                <div class="flex gap-2 mt-3">
                                    @foreach($variant['images'] as $img)
                                        <img src="{{ asset('storage/'.$img) }}" 
                                             class="w-20 h-20 object-cover rounded border shadow-sm">
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Product Details -->
        <div>
            <h2 class="text-xl font-bold mb-2">Product Details</h2>
            <ul class="list-disc list-inside bg-gray-50 p-4 rounded text-gray-700">
                <li><strong>Material:</strong> {{ $product->material ?? '-' }}</li>
                <li><strong>Care:</strong> {{ $product->care ?? '-' }}</li>
            </ul>
        </div>

        <!-- Delivery & Returns -->
        <div>
            <h2 class="text-xl font-bold mb-2">Delivery & Returns</h2>
            <ul class="list-disc list-inside bg-gray-50 p-4 rounded text-gray-700">
                <li><strong>Delivery Time:</strong> {{ $product->delivery_time ?? '-' }}</li>
                <li><strong>Return Policy:</strong> {{ $product->return_policy ?? '-' }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
