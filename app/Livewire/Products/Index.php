<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component
{
    public $products = [];

    public function mount()
    {
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.pages.products.index');
    }

    public function delete(Product $product)
    {
        Storage::delete($product->img_uri);

        $product->delete();
    }

    public function edit($id)
    {
        return redirect(route('products.edit', $id));
    }
}
