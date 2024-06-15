<?php

namespace App\Http\Controllers\Admin\Cpanel;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Log;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $categories = Category::where('name', 'like', "%$search%")->take(50)->get();

        return response()->json($categories);
    }
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        try {
            $category = new Category([
                'name' => $request->input('name'),
                'description' => $request->input('description')
            ]);
    
            // Upload Image
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('categories', 'public');
                $category->image = url('storage/' . $imagePath);
            }
    
            $category->save();
    
            return redirect()->route('categories.index')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while creating the category.');
        }
    }
    

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
{
    try {
        $category = Category::findOrFail($id);
        
        $category->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }

            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = url('storage/' . $imagePath);
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    } catch (\Exception $e) {
        Log::error($e);
        return redirect()->back()->with('error', 'An error occurred while updating the category.');
    }
}

    

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while deleting the category.');
        }
    }
}
