<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function __construct(product $product){
        $this->product = $product;
    }

    public function index(){
        $products = $this->product->latest()->paginate(10);
        return view('products.index', compact('products')); 
    }
    public function create(){
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'content' => 'required',
            'pwd' => 'required'

        ]);
        $this->product->create($request);
        return redirect()->route('products.index');
    }
    public function show(Product $product){
        return view('products.show', compact('product'));
    }
    public function edit(Product $product){
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product){
        $request = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $product->update($request);
        return redirect()->route('products.index', $product);
    }
    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index');
    }
}