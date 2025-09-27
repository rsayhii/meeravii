@extends('admin.layout')

@section('content')
<div class="container mx-auto px-6 py-8">

    <!-- Categories Page -->
    <div id="categories" class="content-section">
        <div class="mb-6 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Categories</h2>
                <p class="text-gray-600">Manage product categories and hierarchy</p>
            </div>
            <div class="flex space-x-3">
                <button onclick="openModal('mainCategoryModal')" 
                        class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add Main Category
                </button>
                <button onclick="openModal('subCategoryModal')" 
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add Sub Category
                </button>
                <button onclick="openModal('subSubCategoryModal')" 
                        class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add Sub-Sub Category
                </button>
            </div>
        </div>

        <!-- Category Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-medium text-gray-800 mb-4">{{ $category->name }}</h3>

                    @if($category->children->count())
                        <ul class="space-y-2">
                            @foreach($category->children as $sub)
                                <li class="flex justify-between items-center">
                                    <span class="text-gray-700">{{ $sub->name }}</span>
                                    <span class="text-sm text-gray-500">{{ $sub->children->count() ?? 0 }} subcategories</span>
                                    <div class="space-x-2">
                                        <button onclick="openEditModal({{ $sub->id }}, '{{ $sub->name }}', '{{ $sub->description ?? '' }}', '{{ $sub->parent_id }}')"
                                            class="text-blue-600 hover:text-blue-800 text-sm font-medium">Edit</button>

                                        <form action="{{ route('admin-category.destroy', $sub->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No subcategories yet</p>
                    @endif

                    <div class="mt-4 pt-4 border-t border-gray-200 flex justify-between">
                        <span class="text-sm text-gray-500">Total: {{ $category->children->count() }} subcategories</span>
                        <div class="space-x-2">
                            <button onclick="openEditModal({{ $category->id }}, '{{ $category->name }}', '{{ $category->description ?? '' }}', '{{ $category->parent_id ?? '' }}')"
                                class="text-blue-600 hover:text-blue-800 text-sm font-medium">Edit</button>
                            <form action="{{ route('admin-category.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- ===================== ADD CATEGORY MODALS ===================== -->
<!-- Main Category Modal -->
<div id="mainCategoryModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
        <h3 class="text-lg font-medium text-gray-800 mb-4">Add Main Category</h3>
        <form action="{{ route('admin-category.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-primary" placeholder="Enter category name" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-primary" placeholder="Enter category description"></textarea>
            </div>
            <input type="hidden" name="parent_id" value="">
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal('mainCategoryModal')" class="bg-white py-2 px-4 border rounded-md text-gray-700 hover:bg-gray-100">Cancel</button>
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary-dark">Add</button>
            </div>
        </form>
    </div>
</div>

<!-- Sub Category Modal -->
<div id="subCategoryModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
        <h3 class="text-lg font-medium text-gray-800 mb-4">Add Sub Category</h3>
        <form action="{{ route('admin-category.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sub Category Name</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-primary" placeholder="Enter sub category name" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Parent Category</label>
                <select name="parent_id" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-primary" required>
                    <option value="">Select Main Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal('subCategoryModal')" class="bg-white py-2 px-4 border rounded-md text-gray-700 hover:bg-gray-100">Cancel</button>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Add</button>
            </div>
        </form>
    </div>
</div>

<!-- Sub-Sub Category Modal -->
<div id="subSubCategoryModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
        <h3 class="text-lg font-medium text-gray-800 mb-4">Add Sub-Sub Category</h3>
        <form action="{{ route('admin-category.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sub-Sub Category Name</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-primary" placeholder="Enter sub-sub category name" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Parent Sub Category</label>
                <select name="parent_id" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-primary" required>
                    <option value="">Select Sub Category</option>
                    @foreach($categories as $cat)
                        @foreach($cat->children as $sub)
                            <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal('subSubCategoryModal')" class="bg-white py-2 px-4 border rounded-md text-gray-700 hover:bg-gray-100">Cancel</button>
                <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700">Add</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Category Modal -->
<div id="editCategoryModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
        <h3 class="text-lg font-medium text-gray-800 mb-4">Edit Category</h3>
        <form id="editCategoryForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                <input type="text" name="name" id="editName" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-primary" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="editDescription" rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-primary"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Parent Category</label>
                <select name="parent_id" id="editParent" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-primary">
                    <option value="">None</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @foreach($cat->children as $sub)
                            <option value="{{ $sub->id }}">-- {{ $sub->name }}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal('editCategoryModal')" class="bg-white py-2 px-4 border rounded-md text-gray-700 hover:bg-gray-100">Cancel</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- JS for Modals -->
<script>
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}
function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}

// Edit modal
function openEditModal(id, name, description, parent_id) {
    openModal('editCategoryModal');
    const form = document.getElementById('editCategoryForm');
    form.action = `/admin-category/${id}`;
    document.getElementById('editName').value = name;
    document.getElementById('editDescription').value = description;
    document.getElementById('editParent').value = parent_id || '';
}
</script>
@endsection
