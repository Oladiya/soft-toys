<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

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
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['present', 'max:255'],
            'price' => ['required', 'int'],
            'brand' => ['required', 'string', 'max:255'],
            'size' => [
                'required',
                'string',
                Rule::in([
                    'small',
                    'medium',
                    'large',
                ]),
            ],
            'view' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'design_and_construction' => ['present', 'max:255'],
            'image' => ['image', 'dimensions:ratio=1/1'],
        ];
        $validated = $request->validate($rules);

        $path = Storage::putFile('/public/product-images', $validated['image']);

        $validated += ['img_uri' => $path];
//        dd($path);

//        dd($validated);

        $product = Product::create($validated);

//        dd($product);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'int'],
            'brand' => ['required', 'string', 'max:255'],
            'size' => [
                'required',
                'string',
                Rule::in([
                    'small',
                    'medium',
                    'large',
                ]),
            ],
            'view' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'design_and_construction' => ['nullable', 'string', 'max:255'],
            'image' => ['image', 'dimensions:ratio=1/1', 'nullable'],
        ];

        $validated = $request->validate($rules);

        $product = Product::findOrFail($id);

        if (isset($validated['image'])) {
            $path = Storage::putFile('/public/product-images', $validated['image']);
            Storage::delete($product->img_uri);
            unset($validated['image']);
            $validated += ['img_uri' => $path];
        }

        $product->update($validated);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        Storage::delete($product->img_uri);
        $product->delete();

        return redirect()->route('products.index');
    }
}
