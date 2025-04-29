<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|integer',
                'description' => 'nullable|string',
                'images' => 'nullable|array',
                'images.*' => 'required|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp', 
            ]);
            // dd($request);

            // Simpan produk
            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
            ]);

            // dd($product);

            Log::info('Product created successfully', [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'created_at' => now(),
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $filePath = 'public/images/' . $fileName;
                    $image->move(public_path('images'), $fileName);
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => 'images/' . $fileName,  
                    ]);
                }
            }

            return to_route('products.index')->with('success', 'Product created successfully.');
            
        } catch (Exception $e) {
            Log::error('Failed to create product', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
                'created_at' => now(),
            ]);
            return back()->with('error', 'Failed to create product: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Mengambil data produk beserta gambar-gambarnya
        $images = $product->images;
    
        // Mengirim data produk dan gambar ke view
        return view('products.show', compact('product', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
