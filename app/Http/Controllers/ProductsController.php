<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
   
    public function index()
    {
        // MENGAMBIL DATA DARI DATABASE
        $items = Product::All();
        return view('pages.products.index', compact('items'));
    }

    public function create()
    {   
        // MENAMPILKAN FORM ISI DATA
        return view('pages.products.create');
    }

 
    public function store(ProductRequest $request)
    {
        $incoming_data = $request->all();
        $incoming_data['slug'] = Str::slug($request->name);

        Product::create($incoming_data);
        return redirect()->route('product.index');
    }

    public function show($id)
    {
        return "wkwk";
    }

  
    public function edit($id)
    {
        $data = Product::findOrFail($id);
        return view('pages.products.edit', compact('data'));
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $item = Product::findOrfail($id);
        $item->update($data);

        return redirect()->route('product.index');
        // dump($request->all());
    }

    public function destroy($id)
    {
        // dd($id);
        Product::destroy($id);
        ProductGallery::where('product_id', $id)->delete();
        return redirect()->route('product.index');

        
    }

    public function gallery(Request $request, $id) {
        $product = Product::findOrFail($id);
        $items = ProductGallery::with('product')
        ->where('product_id', $id)->get();

        return view('pages.products.gallery', compact(['product', 'items']));
    }
}
