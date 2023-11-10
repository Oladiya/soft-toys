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
    #[Url(as: 'brand')]
    public $brandInputs = [];
    public $collapseBrands = false;
    public $priceMin;
    public $priceMax;
    #[Url(as: 'priceMin')]
    public $priceMinInput = '';
    #[Url(as: 'priceMax')]
    public $priceMaxInput = '';
    public $collapsePrice = false;
    public $sizes = [];
    #[Url(as: 'size')]
    public $sizeInputs = [];
    public $collapseSizes = false;
    public $types = [];
    #[Url(as: 'type')]
    public $typeInputs = [];
    public $collapseTypes = false;
    public $views = [];
    #[Url(as: 'view')]
    public $viewInputs = [];
    public $collapseViews = false;

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
            $count = Product::where('brand', $brand->brand)->count();
            $this->brands[] = [
                'name' => $brand->brand,
                'count' => $count,
            ];
        }

        $this->priceMin = Product::min('price');
        $this->priceMax = Product::max('price');

        $sizes = [
            'small',
            'medium',
            'large',
        ];
        foreach ($sizes as $size) {
            $count = Product::where('size', $size)->count();
            $this->sizes[] = [
                'name' => $size,
                'count' => $count,
            ];
        }

        $types = Product::select('type')->distinct()->get();
        foreach ($types as $type) {
            $count = Product::where('type', $type->type)->count();
            $this->types[] = [
                'name' => $type->type,
                'count' => $count,
            ];
        }

        $views = Product::select('view')->distinct()->get();
        foreach ($views as $view) {
            $count = Product::where('view', $view->view)->count();
            $this->views[] = [
                'name' => $view->view,
                'count' => $count,
            ];
        }
    }

    public function render()
    {
        $products = Product::when($this->categoryInput, function ($q) {
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
            })->when($this->typeInputs, function ($q) {
                $q->whereIn('type', $this->typeInputs);
            })->when($this->viewInputs, function ($q) {
                $q->whereIn('view', $this->viewInputs);
            });

        $this->products = $products->get();
        $this->brands = $this->count($this->brands, 'brand');
        $this->sizes = $this->count($this->sizes, 'size');
        $this->types = $this->count($this->types, 'type');
        $this->views = $this->count($this->views, 'view');

        return view('livewire.pages.home');
    }

    protected function count(array $items, string $field)
    {
        foreach ($items as $key => $item) {
            $countRequest = Product::when($this->categoryInput, function ($q) {
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
                })
                ->when($this->typeInputs, function ($q) {
                    $q->whereIn('type', $this->typeInputs);
                })
                ->when($this->viewInputs, function ($q) {
                    $q->whereIn('view', $this->viewInputs);
                });

            $count = $countRequest->where($field, $item['name'])->count();

            $items[$key]['count'] = $count;
        }

        return $items;
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

    public function clearTypes()
    {
        $this->typeInputs = [];
    }

    public function clearViews()
    {
        $this->viewInputs = [];
    }

    public function clearAll()
    {
        $this->clearBrands();
        $this->clearPrices();
        $this->clearSizes();
        $this->clearTypes();
        $this->clearViews();
    }
}
