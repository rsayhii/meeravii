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
            <form id="productForm" method="POST" action="{{ isset($product) ? route('admin-product.update', $product->id) : route('admin-product.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($product)) @method('PUT') @endif

                <!-- (Product Info fields omitted for brevity - keep your existing ones) -->
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
                        {{-- Existing variants (edit) --}}
                        @if(isset($product) && $product->variants)
                            @foreach($product->variants as $index => $variant)
                                <div class="border p-3 mb-3 rounded-md variant-item" data-variant-index="{{ $index }}">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-2">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Color *</label>
                                            <input type="text" name="variants[{{ $index }}][color]" value="{{ $variant['color'] ?? '' }}" class="w-full border border-gray-300 rounded-md px-2 py-1" placeholder="Color" required>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Color Image</label>
                                            <input type="file" name="variants[{{ $index }}][color_image]" class="w-full border border-gray-300 rounded-md px-2 py-1">
                                            @if(!empty($variant['color_image']))
                                                <div class="mt-2">
                                                    <img src="{{ asset('storage/'.$variant['color_image']) }}" class="h-12 w-12 object-cover rounded">
                                                    <input type="hidden" name="variants[{{ $index }}][existing_color_image]" value="{{ $variant['color_image'] }}">
                                                </div>
                                            @endif
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Sizes</label>
                                            <div class="sizes_container">
                                                {{-- Render existing size rows --}}
                                                @php
                                                    $sizesArr = $variant['sizes'] ?? [];
                                                @endphp
                                                @if(!empty($sizesArr))
                                                    @foreach($sizesArr as $s)
                                                        <div class="flex items-center space-x-2 size-row mb-2">
                                                            <input type="text" class="size-label w-1/2 border border-gray-300 rounded-md px-2 py-1" placeholder="Size (e.g. S)" value="{{ $s['size'] ?? '' }}">
                                                            <input type="number" class="size-qty w-1/2 border border-gray-300 rounded-md px-2 py-1" placeholder="Qty" min="0" value="{{ $s['qty'] ?? 0 }}">
                                                            <button type="button" class="remove-size bg-red-500 text-white px-2 py-1 rounded">X</button>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    {{-- No sizes yet: show one empty row --}}
                                                    <div class="flex items-center space-x-2 size-row mb-2">
                                                        <input type="text" class="size-label w-1/2 border border-gray-300 rounded-md px-2 py-1" placeholder="Size (e.g. S)">
                                                        <input type="number" class="size-qty w-1/2 border border-gray-300 rounded-md px-2 py-1" placeholder="Qty" min="0" value="0">
                                                        <button type="button" class="remove-size bg-red-500 text-white px-2 py-1 rounded">X</button>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="mt-2 flex gap-2">
                                                <button type="button" class="add-size-btn px-3 py-1 bg-blue-600 text-white rounded">+ Add Size</button>
                                            </div>

                                            {{-- Hidden json input: controller expects JSON string --}}
                                            <input type="hidden" name="variants[{{ $index }}][sizes]" class="sizes_json_input" id="variants_{{ $index }}_sizes_json" value='@json($variant["sizes"] ?? [])'>
                                        </div>

                                        <div class="md:col-span-3 mt-3">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Images</label>
                                            <input type="file" name="variants[{{ $index }}][images][]" multiple class="w-full border border-gray-300 rounded-md px-2 py-1">
                                            @if(!empty($variant['images']))
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

                <!-- Rest of your form (Product Details / Delivery etc.) -->

                <div class="mb-6">
    <label class="block text-sm font-medium text-gray-700 mb-2">Product Details</label>

    <input type="text" name="material" 
        class="w-full border border-gray-300 rounded-md px-3 py-2 mb-2 focus:ring-primary focus:border-primary"
        placeholder="Material (e.g., 100% Cotton)"
        value="{{ old('material', $product->material ?? '') }}">

    <input type="text" name="care" 
        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-primary focus:border-primary"
        placeholder="Care (e.g., Machine wash)"
        value="{{ old('care', $product->care ?? '') }}">
</div>

<!-- Delivery & Returns -->
<div class="mb-6">
    <label class="block text-sm font-medium text-gray-700 mb-2">Delivery & Returns</label>

    <input type="text" name="delivery_time" 
        class="w-full border border-gray-300 rounded-md px-3 py-2 mb-2 focus:ring-primary focus:border-primary"
        placeholder="Delivery Time (e.g., 3-5 days)"
        value="{{ old('delivery_time', $product->delivery_time ?? '') }}">

    <input type="text" name="return_policy" 
        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-primary focus:border-primary"
        placeholder="Return Policy (e.g., 30 days)"
        value="{{ old('return_policy', $product->return_policy ?? '') }}">
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
    // --- Category selects (unchanged from your existing code) ---
    const categories = @json($categories);
    const selectedSub = @json(old('sub_category_id', $product->sub_category_id ?? null));
    const selectedSubSub = @json(old('sub_sub_category_id', $product->sub_sub_category_id ?? null));

    const categorySelect = document.getElementById('category');
    const subCategorySelect = document.getElementById('sub_category');
    const subSubCategorySelect = document.getElementById('sub_sub_category');

    function updateSubcategories() {
        if (!categorySelect) return;
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
        if (!categorySelect || !subCategorySelect) return;
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

    if (categorySelect) {
        categorySelect.addEventListener('change', () => {
            updateSubcategories();
            updateSubSubcategories();
        });
    }
    if (subCategorySelect) subCategorySelect.addEventListener('change', updateSubSubcategories);

    document.addEventListener('DOMContentLoaded', () => {
        if (categorySelect && categorySelect.value) {
            updateSubcategories();
            setTimeout(() => {
                if (selectedSub) subCategorySelect.value = selectedSub;
                updateSubSubcategories();
                setTimeout(() => {
                    if (selectedSubSub) subSubCategorySelect.value = selectedSubSub;
                }, 50);
            }, 50);
        }
    });

    // --- Variants + Sizes UI Logic ---
    const variantsContainer = document.getElementById('variants_container');
    let variantIndex = {{ isset($product) && $product->variants ? count($product->variants) : 0 }};

    // small helper to escape text when injecting into template strings
    function escapeHtml(str) {
        if (typeof str === 'undefined' || str === null) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');
    }

    function createSizeRowElement(size = '', qty = '') {
        const div = document.createElement('div');
        div.className = 'flex items-center space-x-2 size-row mb-2';
        div.innerHTML = `
            <input type="text" class="size-label w-1/2 border border-gray-300 rounded-md px-2 py-1" placeholder="Size (e.g. S)" value="${escapeHtml(size)}">
            <input type="number" class="size-qty w-1/2 border border-gray-300 rounded-md px-2 py-1" placeholder="Qty" min="0" value="${escapeHtml(qty)}">
            <button type="button" class="remove-size bg-red-500 text-white px-2 py-1 rounded">X</button>
        `;
        return div;
    }

    function updateSizesJsonForVariant(variantEl) {
        const sizesContainer = variantEl.querySelector('.sizes_container');
        const jsonInput = variantEl.querySelector('.sizes_json_input');
        if (!sizesContainer || !jsonInput) return;

        const rows = sizesContainer.querySelectorAll('.size-row');
        const arr = [];
        rows.forEach(r => {
            const sizeVal = r.querySelector('.size-label').value.trim();
            const qtyVal = parseInt(r.querySelector('.size-qty').value) || 0;
            if (sizeVal !== '') {
                arr.push({ size: sizeVal, qty: qtyVal });
            }
        });
        jsonInput.value = JSON.stringify(arr);
    }

    function initSizesForVariant(variantEl) {
        const sizesContainer = variantEl.querySelector('.sizes_container');
        const addSizeBtn = variantEl.querySelector('.add-size-btn');

        // delegate remove clicks and input updates inside sizes container
        sizesContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-size')) {
                const row = e.target.closest('.size-row');
                if (row) {
                    row.remove();
                    updateSizesJsonForVariant(variantEl);
                }
            }
        });

        sizesContainer.addEventListener('input', function() {
            updateSizesJsonForVariant(variantEl);
        });

        addSizeBtn.addEventListener('click', function() {
            sizesContainer.appendChild(createSizeRowElement('', 0));
            updateSizesJsonForVariant(variantEl);
        });

        // Ensure JSON is correct on init
        updateSizesJsonForVariant(variantEl);
    }

    // Initialize sizes for existing variant items
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.variant-item').forEach(el => {
            initSizesForVariant(el);
        });
    });

    // Add new variant
    document.getElementById('add_variant').addEventListener('click', () => {
        const idx = variantIndex;
        const wrapper = document.createElement('div');
        wrapper.className = 'border p-3 mb-3 rounded-md variant-item';
        wrapper.dataset.variantIndex = idx;

        wrapper.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Color *</label>
                    <input type="text" name="variants[${idx}][color]" class="w-full border border-gray-300 rounded-md px-2 py-1" placeholder="Color" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Color Image</label>
                    <input type="file" name="variants[${idx}][color_image]" class="w-full border border-gray-300 rounded-md px-2 py-1">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sizes</label>
                    <div class="sizes_container">
                        <div class="flex items-center space-x-2 size-row mb-2">
                            <input type="text" class="size-label w-1/2 border border-gray-300 rounded-md px-2 py-1" placeholder="Size (e.g. S)">
                            <input type="number" class="size-qty w-1/2 border border-gray-300 rounded-md px-2 py-1" placeholder="Qty" min="0" value="0">
                            <button type="button" class="remove-size bg-red-500 text-white px-2 py-1 rounded">X</button>
                        </div>
                    </div>
                    <div class="mt-2 flex gap-2">
                        <button type="button" class="add-size-btn px-3 py-1 bg-blue-600 text-white rounded">+ Add Size</button>
                    </div>
                    <input type="hidden" name="variants[${idx}][sizes]" class="sizes_json_input" id="variants_${idx}_sizes_json" value='[]'>
                </div>

                <div class="md:col-span-3 mt-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Images</label>
                    <input type="file" name="variants[${idx}][images][]" multiple class="w-full border border-gray-300 rounded-md px-2 py-1">
                    <div class="mt-2 flex gap-2 flex-wrap variant-images-placeholder"></div>
                </div>
            </div>

            <button type="button" class="remove_variant px-2 py-1 bg-red-500 text-white rounded-md text-sm">Remove Variant</button>
        `;

        variantsContainer.appendChild(wrapper);
        initSizesForVariant(wrapper);

        // remove variant handler for this newly added variant
        wrapper.querySelector('.remove_variant').addEventListener('click', function() {
            wrapper.remove();
        });

        variantIndex++;
    });

    // Remove variant for existing ones (delegated)
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove_variant')) {
            const item = e.target.closest('.variant-item');
            if (!item) return;

            // If variant had existing images/ids you may want to collect and mark for removal; for simplicity the server-side code expects removed inputs,
            // so if you need that behavior add hidden inputs into #removed_inputs as your logic previously did.
            item.remove();
        }

        // variant image removal (existing UI)
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

    // On form submit, ensure all variant size JSONs are updated
    document.getElementById('productForm').addEventListener('submit', function(e) {
        document.querySelectorAll('.variant-item').forEach(v => updateSizesJsonForVariant(v));
    });
</script>
@endpush
