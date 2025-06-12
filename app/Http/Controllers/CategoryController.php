<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();
        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $products = $category->products()->get();
        return view('categories.show', compact('category', 'products'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Generate unique slug
        $data['slug'] = Str::slug($data['name']);
        $original = $data['slug'];
        $i = 1;
        while (Category::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $original . '-' . $i++;
        }

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }
}
