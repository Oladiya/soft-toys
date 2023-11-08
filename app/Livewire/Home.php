<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
