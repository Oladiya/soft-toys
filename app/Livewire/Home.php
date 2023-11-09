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
    public $priceMin;
    public $priceMax;
    #[Url(as: 'priceMin')]
    public $priceMinInput = '';
    #[Url(as: 'priceMax')]
    public $priceMaxInput = '';
    public $collapsePrice = false;
    public $sizes;
    #[Url(as: 'size')]
    public $sizeInputs = [];
    public $collapseSizes = false;

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

        $this->priceMin = Product::min('price');
        $this->priceMax = Product::max('price');

        $this->sizes = [
            'small',
            'medium',
            'large',
        ];
    }

    public function render()
    {
        $this->products = Product::when($this->categoryInput, function ($q) {
            $q->where('category', $this->categoryInput);
        })
            ->when($this->brandInputs, function ($q) {
                $q->whereIn('brand', $this->brandInputs);
            })
            ->when($this->priceMinInput, function ($q) {
                $q->where('price', '>', $this->priceMinInput);
            })
            ->when($this->priceMaxInput, function ($q) {
                $q->where('price', '<', $this->priceMaxInput);
            })
            ->when($this->sizeInputs, function ($q) {
                $q->whereIn('size', $this->sizeInputs);
            })->get();
        return view('livewire.pages.home', [
            'products' => $this->products,
            'categories' => $this->categories,
        ]);


    }

    public function clearCategories()
    {
        $this->categoryInput = '';
    }

    public function clearBrands()
    {
        $this->brandInputs = [];
    }

    public function clearPrices()
    {
        $this->priceMinInput = '';
        $this->priceMaxInput = '';
    }

    public function clearSizes()
    {
        $this->sizeInputs = [];
    }

    public function clearAll()
    {
        $this->clearBrands();
        $this->clearPrices();
        $this->clearSizes();
    }
}
