<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index() : View
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * create
     * 
     * @return view
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * store
     * 
     * @param mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        Product::create([
            'image'         => $image->hashName(),
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock
        ]);

        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * update
     *
     * @param mixed $request
     * @param mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        //get product by ID
        $product = Product::findOrFail($id);
        
        //check if image is uploaded
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());
            
            //delete old image
            Storage::delete('public/products/'.$product->image);

            //update product with new image
            $product->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        } else {
            //update product without image
            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        }

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $product = Product::findOrFail($id);
        
        //delete image
        Storage::delete('public/products/'.$product->image);
        
        //delete product
        $product->delete();

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /**
     * edit
     *
     * @param mixed $id
     * @return View
     */
    public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
}
}
