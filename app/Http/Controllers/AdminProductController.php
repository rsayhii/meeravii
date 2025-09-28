<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'subCategory', 'subSubCategory'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.product.product', compact('products'));
    }

    public function create()
    {
        $categories = Category::with(['children.children'])->whereNull('parent_id')->get();
        return view('admin.product.addproduct', compact('categories'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'sku' => 'required|string|unique:products,sku',
        'category_id' => 'required|exists:categories,id',
        'sub_category_id' => 'nullable|exists:categories,id',
        'sub_sub_category_id' => 'nullable|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'discount_price' => 'nullable|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'variants' => 'nullable|array',
        'variants.*.color' => 'required_with:variants|string',
        'variants.*.sizes' => 'required_with:variants|string',
        'variants.*.color_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'variants.*.images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'images' => 'nullable|array',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        'material'       => 'nullable|string|max:255',
        'care'           => 'nullable|string|max:255',
        'delivery_time'  => 'nullable|string|max:255',
        'return_policy'  => 'nullable|string|max:255',

    ]);

    try {
        $variantsData = [];
        $variantsInput = $request->input('variants', []);

        foreach ($variantsInput as $index => $variant) {
            $sizes = json_decode($variant['sizes'] ?? '[]', true) ?: [];
            $variantImages = [];

            // Handle color image
            $colorImagePath = null;
            if ($request->hasFile("variants.$index.color_image")) {
                $file = $request->file("variants.$index.color_image");
                if ($file->isValid()) {
                    $colorImagePath = $file->store('products/colors', 'public');
                }
            }

            // Handle variant images
            $uploaded = $request->file("variants.$index.images");
            if (is_array($uploaded)) {
                foreach ($uploaded as $file) {
                    if ($file && $file->isValid()) {
                        $variantImages[] = $file->store('products/variants', 'public');
                    }
                }
            }

            $variantsData[] = [
                'color' => $variant['color'] ?? null,
                'color_image' => $colorImagePath,
                'sizes' => $sizes,
                'images' => !empty($variantImages) ? $variantImages : [],
            ];
        }

        // Product-level images
        $productImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                if ($img && $img->isValid()) {
                    $productImages[] = $img->store('products/images', 'public');
                }
            }
        }

    $product = Product::create([
    'name' => $validated['name'],
    'sku' => $validated['sku'],
    'category_id' => $validated['category_id'],
    'sub_category_id' => $validated['sub_category_id'] ?? null,
    'sub_sub_category_id' => $validated['sub_sub_category_id'] ?? null,
    'price' => $validated['price'],
    'discount_price' => $validated['discount_price'] ?? null,
    'stock' => $validated['stock'],
    'description' => $validated['description'] ?? null,
    'variants' => $variantsData ?? null,
    'product_details' => [
        'material' => $validated['material'] ?? null,
        'care' => $validated['care'] ?? null,
    ],
    'delivery_returns' => [
        'delivery_time' => $validated['delivery_time'] ?? null,
        'return_policy' => $validated['return_policy'] ?? null,
    ],
    'images' => !empty($productImages) ? $productImages : null,
    'status' => $validated['status'] ?? 'Active',
]);




        return redirect()->route('admin-product.index')
            ->with('success', 'Product created successfully!');

    } catch (Exception $e) {
        return redirect()->back()
            ->with('error', 'Error creating product: ' . $e->getMessage())
            ->withInput();
    }
}


    public function show(string $id)
    {
        $product = Product::with(['category', 'subCategory', 'subSubCategory'])->findOrFail($id);
        return view('admin.product.showproduct', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::with(['children.children'])->whereNull('parent_id')->get();

        return view('admin.product.editproduct', compact('product', 'categories'));
    }

 public function update(Request $request, string $id)
{
    $product = Product::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'sku' => 'required|string|unique:products,sku,' . $id,
        'category_id' => 'required|exists:categories,id',
        'sub_category_id' => 'nullable|exists:categories,id',
        'sub_sub_category_id' => 'nullable|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'discount_price' => 'nullable|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'variants' => 'nullable|array',
        'variants.*.color' => 'required_with:variants|string',
        'variants.*.sizes' => 'required_with:variants|string',
        'variants.*.color_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'variants.*.images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'images' => 'nullable|array',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        'material'       => 'nullable|string|max:255',
        'care'           => 'nullable|string|max:255',
        'delivery_time'  => 'nullable|string|max:255',
        'return_policy'  => 'nullable|string|max:255',
        'status'         => 'required|in:Active,Inactive',
    ]);

    try {
        // ===== PRODUCT IMAGES =====
        $productImages = $product->images ?? [];

        // Remove any marked product images
        if ($request->has('removed_product_images')) {
            $toRemove = $request->input('removed_product_images', []);
            $productImages = array_values(array_diff($productImages, $toRemove));
            foreach ($toRemove as $imgPath) {
                if (Storage::disk('public')->exists($imgPath)) {
                    Storage::disk('public')->delete($imgPath);
                }
            }
        }

        // Add newly uploaded product images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                if ($img && $img->isValid()) {
                    $productImages[] = $img->store('products/images', 'public');
                }
            }
        }

        // ===== VARIANTS =====
        $variantsData = [];
        $variantsInput = $request->input('variants', []);

        foreach ($variantsInput as $index => $variant) {
            $sizes = json_decode($variant['sizes'] ?? '[]', true) ?: [];

            // Keep existing color image unless replaced
            $colorImagePath = $variant['existing_color_image'] ?? null;
            if ($request->hasFile("variants.$index.color_image")) {
                $file = $request->file("variants.$index.color_image");
                if ($file->isValid()) {
                    // Delete old color image
                    if ($colorImagePath && Storage::disk('public')->exists($colorImagePath)) {
                        Storage::disk('public')->delete($colorImagePath);
                    }
                    $colorImagePath = $file->store('products/colors', 'public');
                }
            }

            // Handle variant images
            $variantImages = $variant['existing_images'] ?? [];

            // Remove any marked variant images
            if (!empty($variant['removed_images'])) {
                $variantImages = array_values(array_diff($variantImages, $variant['removed_images']));
                foreach ($variant['removed_images'] as $imgPath) {
                    if (Storage::disk('public')->exists($imgPath)) {
                        Storage::disk('public')->delete($imgPath);
                    }
                }
            }

            // Add new variant images
            $uploaded = $request->file("variants.$index.images");
            if (is_array($uploaded)) {
                foreach ($uploaded as $file) {
                    if ($file && $file->isValid()) {
                        $variantImages[] = $file->store('products/variants', 'public');
                    }
                }
            }

            $variantsData[] = [
                'color' => $variant['color'] ?? null,
                'color_image' => $colorImagePath,
                'sizes' => $sizes,
                'images' => $variantImages,
            ];
        }

        // ===== UPDATE PRODUCT =====
        $product->update([
            'name' => $validated['name'],
            'sku' => $validated['sku'],
            'category_id' => $validated['category_id'],
            'sub_category_id' => $validated['sub_category_id'] ?? null,
            'sub_sub_category_id' => $validated['sub_sub_category_id'] ?? null,
            'price' => $validated['price'],
            'discount_price' => $validated['discount_price'] ?? null,
            'stock' => $validated['stock'],
            'description' => $validated['description'] ?? null,
            'variants' => !empty($variantsData) ? $variantsData : null,
            'material' => $validated['material'] ?? null,
            'care' => $validated['care'] ?? null,
            'delivery_time' => $validated['delivery_time'] ?? null,
            'return_policy' => $validated['return_policy'] ?? null,
            'images' => !empty($productImages) ? $productImages : null,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin-product.index')
            ->with('success', 'Product updated successfully!');
    } catch (Exception $e) {
        return redirect()->back()
            ->with('error', 'Error updating product: ' . $e->getMessage())
            ->withInput();
    }
}



    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id);

            // Delete product-level images
            if ($product->images) {
                foreach ($product->images as $imagePath) {
                    Storage::disk('public')->delete($imagePath);
                }
            }

            // Delete variant images
            if ($product->variants) {
                foreach ($product->variants as $variant) {
                    if (isset($variant['images'])) {
                        foreach ($variant['images'] as $imagePath) {
                            Storage::disk('public')->delete($imagePath);
                        }
                    }
                }
            }

            $product->delete();

            return redirect()->route('admin-product.index')
                ->with('success', 'Product deleted successfully!');

        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Error deleting product: ' . $e->getMessage());
        }
    }
}
