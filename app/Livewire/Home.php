<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public $products;
    public $categories = [];
    #[Url(as: 'category')]
    public $categoryInput = '';
    public $brands = [];
    #[Url(as: 'brands')]
    public $brandInputs = [];
    public $collapseBrands = false;

    public function mount()
    {
        $categories = Product::select('category')->distinct()->get();
        foreach ($categories as $category) {
            if (!is_null($category->category)) {
                array_push($this->categories, $category->category);
            }
        }
        $brands = Product::select('brand')->distinct()->get();
        foreach ($brands as $brand) {
            array_push($this->brands, $brand->brand);
        }
    }

    public function render()
    {
        $this->products = Product::when($this->categoryInput, function ($q) {
            $q->where('category', $this->categoryInput);
        })->when($this->brandInputs, function ($q) {
            $q->whereIn('brand', $this->brandInputs);
        })->get();
        return view('livewire.pages.home', [
            'products' => $this->products,
            'categories' => $this->categories,
        ]);


    }

    public function allCategories()
    {
        $this->categoryInput = '';
    }

    public function allBrands()
    {
        $this->brandInputs = [];
    }
}
