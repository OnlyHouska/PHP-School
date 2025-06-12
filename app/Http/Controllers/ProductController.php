<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data['slug'] = Str::slug($data['name']);

        $original = $data['slug'];
        $i = 1;
        while (Product::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $original.'-'.$i++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->storeImage($request->file('image'));  // Store the image and get the path
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'slug' => $data['slug'],
        ]);

        return redirect()->route('products.index');
    }

    public function storeImage($image)
    {
        return $image->store('products', 'public');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
