@extends('admin.layout')

@section('content')

@php
if (! function_exists('intToRoman')) {
    function intToRoman($num) {
        $n = intval($num);
        if ($n <= 0) return '';
        $map = [
            1000 => 'M', 900 => 'CM', 500 => 'D', 400 => 'CD',
            100  => 'C',  90  => 'XC', 50  => 'L',  40  => 'XL',
            10   => 'X',  9   => 'IX', 5   => 'V',  4   => 'IV',
            1    => 'I'
        ];
        $res = '';
        foreach ($map as $value => $roman) {
            while ($n >= $value) {
                $res .= $roman;
                $n -= $value;
            }
        }
        return $res;
    }
}
@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        'primary-dark': '#2563eb',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100">
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
                        <i class="fas fa-plus mr"></i> Add Main Category
                    </button>
                </div>
            </div>

            <!-- Category Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subcategories</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                <tbody class="bg-white divide-y divide-gray-200">
    @php $mainIndex = 1; @endphp
    @foreach($categories as $category)
        <!-- Main Category Row -->
        <tr class="bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">{{ $mainIndex }}. {{ $category->name }}</div>
                        <div class="text-sm text-gray-500">Main Category</div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="h-10 w-10 rounded-full object-cover">
                @else
                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-image text-gray-400"></i>
                    </div>
                @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ Str::limit($category->description ?? 'No description', 50) }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $category->children->count() }} subcategories
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <!-- actions (keep as you had them) -->
                <button onclick="openEditModal({{ $category->id }}, '{{ $category->name }}', '{{ $category->description ?? '' }}', '{{ $category->parent_id ?? '' }}', '{{ $category->image ?? '' }}')"
                    class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                <button onclick="openAddSubModal({{ $category->id }})" class="text-green-600 hover:text-green-900 mr-3">Add Sub</button>
                <form action="{{ route('admin-category.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                </form>
            </td>
        </tr>

        <!-- Subcategories -->
        @php $subIndex = 'a'; @endphp
        @foreach($category->children as $sub)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-8">
                            <div class="text-sm font-medium text-gray-900">{{ $subIndex }}) {{ $sub->name }}</div>
                            <div class="text-sm text-gray-500">Subcategory</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if($sub->image)
                        <img src="{{ asset('storage/' . $sub->image) }}" alt="{{ $sub->name }}" class="h-10 w-10 rounded-full object-cover">
                    @else
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-image text-gray-400"></i>
                        </div>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ Str::limit($sub->description ?? 'No description', 50) }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $sub->children->count() }} sub-subcategories
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="openEditModal({{ $sub->id }}, '{{ $sub->name }}', '{{ $sub->description ?? '' }}', '{{ $sub->parent_id }}', '{{ $sub->image ?? '' }}')"
                        class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                    @if($sub->children->count() == 0)
                        <button onclick="openAddSubModal({{ $sub->id }})" class="text-green-600 hover:text-green-900 mr-3">Add Sub</button>
                    @endif
                    <form action="{{ route('admin-category.destroy', $sub->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Sub-Subcategories -->
            @php $subSubIndex = 1; @endphp
            @foreach($sub->children as $subSub)
                <tr class="bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-12">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ strtolower(intToRoman($subSubIndex)) }}) {{ $subSub->name }}
                                </div>
                                <div class="text-sm text-gray-500">Sub-subcategory</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($subSub->image)
                            <img src="{{ asset('storage/' . $subSub->image) }}" alt="{{ $subSub->name }}" class="h-10 w-10 rounded-full object-cover">
                        @else
                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ Str::limit($subSub->description ?? 'No description', 50) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button onclick="openEditModal({{ $subSub->id }}, '{{ $subSub->name }}', '{{ $subSub->description ?? '' }}', '{{ $subSub->parent_id }}', '{{ $subSub->image ?? '' }}')"
                            class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                        <form action="{{ route('admin-category.destroy', $subSub->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                @php $subSubIndex++; @endphp
            @endforeach

            @php $subIndex++; @endphp
        @endforeach

        @php $mainIndex++; @endphp
    @endforeach
</tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- ===================== MODALS ===================== -->
    <!-- Main Category Modal -->
    <div id="mainCategoryModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Add Main Category</h3>
            <form action="{{ route('admin-category.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                    <input type="text" name="name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-primary" placeholder="Enter category name" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-primary" placeholder="Enter category description"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category Image</label>
                    <div class="mt-1 flex items-center">
                        <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                            <img id="mainCategoryImagePreview" src="" alt="" class="h-full w-full object-cover hidden">
                            <svg id="mainCategoryImagePlaceholder" class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>
                        <input type="file" name="image" id="mainCategoryImage" accept="image/*" class="ml-5 py-2 px-3 border border-gray-300 rounded-md text-sm" onchange="previewImage(this, 'mainCategoryImagePreview', 'mainCategoryImagePlaceholder')">
                    </div>
                </div>
                <input type="hidden" name="parent_id" value="">
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('mainCategoryModal')" class="bg-white py-2 px-4 border rounded-md text-gray-700 hover:bg-gray-100">Cancel</button>
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary-dark">Add</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Subcategory Modal -->
    <div id="addSubModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Add Subcategory</h3>
            <form id="addSubForm" action="{{ route('admin-category.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                    <input type="text" name="name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-primary" placeholder="Enter category name" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-primary" placeholder="Enter category description"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category Image</label>
                    <div class="mt-1 flex items-center">
                        <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                            <img id="subCategoryImagePreview" src="" alt="" class="h-full w-full object-cover hidden">
                            <svg id="subCategoryImagePlaceholder" class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>
                        <input type="file" name="image" id="subCategoryImage" accept="image/*" class="ml-5 py-2 px-3 border border-gray-300 rounded-md text-sm" onchange="previewImage(this, 'subCategoryImagePreview', 'subCategoryImagePlaceholder')">
                    </div>
                </div>
                <input type="hidden" name="parent_id" id="addSubParentId" value="">
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('addSubModal')" class="bg-white py-2 px-4 border rounded-md text-gray-700 hover:bg-gray-100">Cancel</button>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Add</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div id="editCategoryModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Edit Category</h3>
            <form id="editCategoryForm" method="POST" class="space-y-4" enctype="multipart/form-data">
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
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category Image</label>
                    <div class="mt-1 flex items-center">
                        <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                            <img id="editImagePreview" src="" alt="" class="h-full w-full object-cover">
                            <svg id="editImagePlaceholder" class="h-full w-full text-gray-300 hidden" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>
                        <input type="file" name="image" id="editImage" accept="image/*" class="ml-5 py-2 px-3 border border-gray-300 rounded-md text-sm" onchange="previewImage(this, 'editImagePreview', 'editImagePlaceholder')">
                    </div>
                    <input type="hidden" name="current_image" id="editCurrentImage">
                </div>
                <div id="editParentSection">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Parent Category</label>
                    <select name="parent_id" id="editParent" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-primary">
                        <option value="">None (Main Category)</option>
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

        // Add subcategory modal
        function openAddSubModal(parentId) {
            openModal('addSubModal');
            document.getElementById('addSubParentId').value = parentId;
        }

        // Edit modal
        function openEditModal(id, name, description, parent_id, image) {
            openModal('editCategoryModal');
            const form = document.getElementById('editCategoryForm');
            form.action = `/admin-category/${id}`;
            document.getElementById('editName').value = name;
            document.getElementById('editDescription').value = description;
            document.getElementById('editParent').value = parent_id || '';
            document.getElementById('editCurrentImage').value = image;
            
            // Set image preview
            const preview = document.getElementById('editImagePreview');
            const placeholder = document.getElementById('editImagePlaceholder');
            
            if (image) {
                preview.src = `/storage/${image}`;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            } else {
                preview.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }
            
            // Hide parent selection for main categories
            const parentSection = document.getElementById('editParentSection');
            if (!parent_id) {
                parentSection.classList.add('hidden');
            } else {
                parentSection.classList.remove('hidden');
            }
        }

        // Image preview function
        function previewImage(input, previewId, placeholderId) {
            const preview = document.getElementById(previewId);
            const placeholder = document.getElementById(placeholderId);
            const file = input.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            const modals = document.querySelectorAll('[id$="Modal"]');
            modals.forEach(modal => {
                if (event.target === modal) {
                    closeModal(modal.id);
                }
            });
        }
    </script>
</body>
</html>

@endsection
