<?php

namespace App\Livewire;

use Livewire\Component;

class AdminBlock extends Component
{
    public function render()
    {
        return view('livewire.admin-block');
    }

    public function productList() {
        return $this->redirect(route('products.index'), navigate: true);
    }

    public function addProduct() {
        return $this->redirect(route('products.create'), navigate: true);
    }
}
