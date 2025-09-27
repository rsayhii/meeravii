@extends('admin.layout')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">{{ isset($product) ? 'Edit Product' : 'Add New Product' }}</h2>
        <p class="text-gray-600">{{ isset($product) ? 'Update product details' : 'Create a new product listing for your store' }}</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6">
            <form method="POST" action="{{ isset($product) ? route('admin-product.update', $product->id) : route('admin-product.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($product)) @method('PUT') @endif

                <!-- Product Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Product Name *</label>
                        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-primary focus:border-primary" placeholder="Enter product name" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">SKU *</label>
                        <input type="text" name="sku" value="{{ old('sku', $product->sku ?? '') }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-primary focus:border-primary" placeholder="Enter SKU" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Category *</label>
                        <select name="category_id" id="category" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-primary focus:border-primary" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ (old('category_id', $product->category_id ?? '') == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subcategory</label>
                        <select name="sub_category_id" id="sub_category" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-primary focus:border-primary">
                            <option value="">Select Subcategory</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sub-Subcategory</label>
                        <select name="sub_sub_category_id" id="sub_sub_category" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-primary focus:border-primary">
                            <option value="">Select Sub-Subcategory</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Price ($) *</label>
                        <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $product->price ?? '') }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-primary focus:border-primary" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Discount Price ($)</label>
                        <input type="number" step="0.01" min="0" name="discount_price" value="{{ old('discount_price', $product->discount_price ?? '') }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Stock *</label>
                        <input type="number" name="stock" min="0" value="{{ old('stock', $product->stock ?? 0) }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-primary focus:border-primary" required>
                    </div>
                    @if(isset($product))
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status *</label>
                        <select name="status" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-primary focus:border-primary" required>
                            <option value="Active" {{ $product->status == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ $product->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    @endif
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-primary focus:border-primary" placeholder="Enter product description">{{ old('description', $product->description ?? '') }}</textarea>
                </div>

                <!-- Product Images -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Product Images</label>
                    <input type="file" name="images[]" multiple class="w-full border border-gray-300 rounded-md px-2 py-1">
                    <p class="text-xs text-gray-500 mt-1">Upload multiple images for product gallery.</p>

                    @if(isset($product) && $product->images)
                        <div class="mt-3 grid grid-cols-6 gap-2">
                            @foreach($product->images as $img)
                                <div class="product-image-item relative border p-1" data-path="{{ $img }}">
                                    <img src="{{ asset('storage/' . $img) }}" class="h-20 w-20 object-cover rounded">
                                    <button type="button" class="remove-product-image absolute top-0 right-0 bg-red-500 text-white text-xs px-1 rounded">X</button>
                                    <input type="hidden" name="existing_images" value="{{ $img }}">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- container for removed product image hidden inputs -->
                <div id="removed_product_inputs"></div>

                <!-- Variants -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Variants (Color → Sizes → Images)</label>
                    <div id="variants_container">
                        @if(isset($product) && $product->variants)
                            @foreach($product->variants as $index => $variant)
                                <div class="border p-3 mb-3 rounded-md variant-item">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-2">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                                            <input type="text" name="variants[{{ $index }}][color]" value="{{ $variant['color'] ?? '' }}" class="w-full border border-gray-300 rounded-md px-2 py-1" placeholder="Color" required>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Sizes (JSON)</label>
                                            <textarea name="variants[{{ $index }}][sizes]" class="w-full border border-gray-300 rounded-md px-2 py-1" placeholder='[{"size":"S","qty":10},{"size":"M","qty":15}]' required>{{ json_encode($variant['sizes'] ?? []) }}</textarea>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Images</label>
                                            <input type="file" name="variants[{{ $index }}][images][]" multiple class="w-full border border-gray-300 rounded-md px-2 py-1">
                                            @if(isset($variant['images']))
                                                <div class="mt-2 flex gap-2 flex-wrap">
                                                    @foreach($variant['images'] as $vimg)
                                                        <div class="variant-image-item relative" data-variant-index="{{ $index }}" data-path="{{ $vimg }}">
                                                            <img src="{{ asset('storage/' . $vimg) }}" class="h-12 w-12 object-cover rounded">
                                                            <button type="button" class="remove-variant-image absolute top-0 right-0 bg-red-500 text-white text-xs px-1 rounded">X</button>
                                                            <input type="hidden" name="variants[{{ $index }}][existing_images][]" value="{{ $vimg }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="button" class="remove_variant px-2 py-1 bg-red-500 text-white rounded-md text-sm">Remove Variant</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" id="add_variant" class="mt-2 px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-dark">Add Variant</button>
                </div>

                <!-- container for removed variant hidden inputs -->
                <div id="removed_inputs"></div>

                <!-- Product Details -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Product Details (JSON)</label>
                    <textarea name="product_details" rows="4" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-primary focus:border-primary" placeholder='{"material":"100% Cotton","care":"Machine wash"}'>{{ old('product_details', isset($product) && $product->product_details ? json_encode($product->product_details) : '') }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Example: {"material":"100% Cotton","care":"Machine wash"} </p>
                </div>

                <!-- Delivery & Returns -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Delivery & Returns (JSON)</label>
                    <textarea name="delivery_returns" rows="4" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-primary focus:border-primary" placeholder='{"delivery_time":"3-5 days","return_policy":"30 days"}'>{{ old('delivery_returns', isset($product) && $product->delivery_returns ? json_encode($product->delivery_returns) : '') }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Example: {"delivery_time":"3-5 days","return_policy":"30 days"} </p>
                </div>

                <!-- Form Buttons -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin-product.index') }}" class="bg-white py-2 px-6 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition duration-200">Cancel</a>
                    <button type="submit" class="bg-primary py-2 px-6 text-white rounded-md hover:bg-primary-dark transition duration-200">
                        {{ isset($product) ? 'Update Product' : 'Save Product' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const categories = @json($categories);
    const selectedSub = @json(old('sub_category_id', $product->sub_category_id ?? null));
    const selectedSubSub = @json(old('sub_sub_category_id', $product->sub_sub_category_id ?? null));

    const categorySelect = document.getElementById('category');
    const subCategorySelect = document.getElementById('sub_category');
    const subSubCategorySelect = document.getElementById('sub_sub_category');
    const variantsContainer = document.getElementById('variants_container');
    let variantIndex = {{ isset($product) && $product->variants ? count($product->variants) : 0 }};

    function updateSubcategories() {
        const categoryId = categorySelect.value;
        subCategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
        subSubCategorySelect.innerHTML = '<option value="">Select Sub-Subcategory</option>';

        if (!categoryId) return;

        const category = categories.find(c => c.id == categoryId);
        if (category && category.children && Array.isArray(category.children)) {
            category.children.forEach(subCat => {
                const option = document.createElement('option');
                option.value = subCat.id;
                option.textContent = subCat.name;
                if (selectedSub && subCat.id == selectedSub) option.selected = true;
                subCategorySelect.appendChild(option);
            });
        }
    }

    function updateSubSubcategories() {
        const categoryId = categorySelect.value;
        const subCategoryId = subCategorySelect.value;
        subSubCategorySelect.innerHTML = '<option value="">Select Sub-Subcategory</option>';

        if (!categoryId || !subCategoryId) return;

        const category = categories.find(c => c.id == categoryId);
        if (category && category.children && Array.isArray(category.children)) {
            const subCategory = category.children.find(sc => sc.id == subCategoryId);
            if (subCategory && subCategory.children && Array.isArray(subCategory.children)) {
                subCategory.children.forEach(subSubCat => {
                    const option = document.createElement('option');
                    option.value = subSubCat.id;
                    option.textContent = subSubCat.name;
                    if (selectedSubSub && subSubCat.id == selectedSubSub) option.selected = true;
                    subSubCategorySelect.appendChild(option);
                });
            }
        }
    }

    categorySelect.addEventListener('change', () => {
        // reset selectedSub/SubSub so new selection persists only if user selected
        updateSubcategories();
        updateSubSubcategories();
    });
    subCategorySelect.addEventListener('change', updateSubSubcategories);

    // initialize selects (for edit page)
    document.addEventListener('DOMContentLoaded', () => {
        if (categorySelect.value) {
            updateSubcategories();
            // small timeout to ensure DOM update then set subcategory and subsub if provided
            setTimeout(() => {
                if (selectedSub) {
                    subCategorySelect.value = selectedSub;
                }
                updateSubSubcategories();
                setTimeout(() => {
                    if (selectedSubSub) {
                        subSubCategorySelect.value = selectedSubSub;
                    }
                }, 50);
            }, 50);
        }
    });

    // Variants: add / remove
    document.getElementById('add_variant').addEventListener('click', () => {
        const idx = variantIndex;
        const variantHtml = `
            <div class="border p-3 mb-3 rounded-md variant-item">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-2">
                   <div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Color *</label>
    <input type="text" name="variants[${variantIndex}][color]" class="w-full border border-gray-300 rounded-md px-2 py-1" placeholder="Color" required>
</div>
<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Color Image *</label>
    <input type="file" name="variants[${variantIndex}][color_image]" class="w-full border border-gray-300 rounded-md px-2 py-1" required>
</div>
<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Sizes (JSON) *</label>
    <textarea name="variants[${variantIndex}][sizes]" class="w-full border border-gray-300 rounded-md px-2 py-1" placeholder='[{"size":"S","qty":10},{"size":"M","qty":15}]' required></textarea>
</div>
<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Images</label>
    <input type="file" name="variants[${variantIndex}][images][]" multiple class="w-full border border-gray-300 rounded-md px-2 py-1">
</div>

                </div>
                <button type="button" class="remove_variant px-2 py-1 bg-red-500 text-white rounded-md text-sm">Remove Variant</button>
            </div>
        `;
        const wrapper = document.createElement('div');
        wrapper.innerHTML = variantHtml;
        variantsContainer.appendChild(wrapper);
        wrapper.querySelector('.remove_variant').addEventListener('click', function() {
            this.closest('.variant-item').remove();
        });
        variantIndex++;
    });

    // existing remove variant buttons
    document.querySelectorAll('.remove_variant').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.variant-item').remove();
        });
    });

    // delegated events: remove product image or variant image
    document.addEventListener('click', function(e) {
        // product image remove
        if (e.target.matches('.remove-product-image')) {
            const item = e.target.closest('.product-image-item');
            const path = item.dataset.path;
            // add hidden input to mark removal
            const container = document.getElementById('removed_product_inputs');
            const inp = document.createElement('input');
            inp.type = 'hidden';
            inp.name = 'removed_product_images[]';
            inp.value = path;
            container.appendChild(inp);
            item.remove();
        }

        // variant image remove
        if (e.target.matches('.remove-variant-image')) {
            const item = e.target.closest('.variant-image-item');
            const path = item.dataset.path;
            const variantIndex = item.dataset.variantIndex;
            // add hidden input to mark removal for this variant
            const container = document.getElementById('removed_inputs');
            const inp = document.createElement('input');
            inp.type = 'hidden';
            inp.name = `variants[${variantIndex}][removed_images][]`;
            inp.value = path;
            container.appendChild(inp);
            item.remove();
        }
    });
</script>
@endpush
