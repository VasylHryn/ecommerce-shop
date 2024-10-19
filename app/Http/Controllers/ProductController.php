<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = new Product();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;

    // Обработка изображения
    if ($request->hasFile('image')) {
        // Сохранение изображения в storage/app/public/products
        $path = $request->file('image')->store('products', 'public');
        // Сохраняем путь к изображению в БД
        $product->image = $path;
    }

    $product->category_id = $request->category_id;
    $product->save();

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%")
                    ->get();

        return view('products.search', compact('products', 'query'));
    }

}

