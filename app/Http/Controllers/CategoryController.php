<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories (Admin View).
     */
    public function index()
{
    // Use paginate instead of get
    $categories = Category::paginate(10); // Fetch 10 categories per page
    return view('categories.index', compact('categories'));
}


    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new category
        Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id); // Find the category by ID
        return view('admin.categories.edit', compact('category')); // Pass the category to the view
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id); // Find the category by ID

        // Update the category with the validated data
        $category->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id); // Find the category by ID

        // Check if the category is associated with players (prevent deletion if needed)
        if ($category->players()->exists()) {
            return redirect()->route('admin.categories.index')->with('error', 'Cannot delete category linked to players.');
        }

        $category->delete(); // Delete the category

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
