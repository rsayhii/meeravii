<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index()
{
    try {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.product.categories', compact('categories'));
    } catch (Throwable $th) {
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong.',
            'error' => $th->getMessage(),
        ], 500);
    }
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = Category::all();
        // return view('admin.categories.create', compact('categories'));
         return redirect()->route('admin-category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());

       return redirect()->route('admin-category.index')->with('success', 'Category created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //  $categories = Category::all();
        // return view('admin.categories.edit', compact('category', 'categories'));
        return redirect()->route('admin-category.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);
    $request->validate([
        'name' => 'required|string|max:255',
        'parent_id' => 'nullable|exists:categories,id',
        'description' => 'nullable|string',
    ]);

    $category->update($request->all());

    return redirect()->route('admin-category.index')->with('success', 'Category updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $category = Category::findOrFail($id);
    $category->delete();

    return redirect()->route('admin-category.index')->with('success', 'Category deleted successfully.');
}

    
}
