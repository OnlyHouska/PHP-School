<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;  // Import the Category model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Show the form to create a new product
    public function create()
    {
        $categories = Category::all();  // Fetch all categories
        return view('products.create', compact('categories'));
    }

    // Store a new product in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',  // Validate category_id
        ]);

        Product::create($request->all());

        return redirect()->route('products.index');
    }
}
