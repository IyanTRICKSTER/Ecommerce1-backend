<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Http\Requests\ProductGalleryRequest;

class ProductGalleryController extends Controller
{

    public function __construct()
    {
        // authenticate the user
        $this->middleware('auth');
    }

    public function index()
    {
        $items = ProductGallery::with('product')
        ->where('is_default', 1)->get();
        return view('pages.product-galleries.index', compact('items'));
    }


    public function create()
    {
        $product = Product::All();
        // dump($product);
        return view('pages.product-galleries.create', compact('product'));
    }


    public function store(ProductGalleryRequest $request)
    {
        $incoming_data = $request->all();
        $incoming_data['photo'] = $request->file('photo')->store(
            'assets/product',
            'public'
        );

        ProductGallery::create($incoming_data);
        return redirect()->route('product-galleries.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $items = ProductGallery::find($id);
        $items->delete();
        return redirect()->route('product-galleries.index');
    }
}
