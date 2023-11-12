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
        $this->redirect(route('products.index'), navigate: true);
    }

    public function addProduct() {
        $this->redirect(route('products.create'), navigate: true);
    }

    public function orderList() {
        $this->redirect(route('orders.index'), navigate: true);
    }
}
