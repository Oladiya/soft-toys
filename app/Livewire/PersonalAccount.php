<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PersonalAccount extends Component
{
    public $orders = [];
    public $totalCounts = [];
    public $totalPrices = [];

    public function mount()
    {
        $this->orders = Order::where('user_id', Auth::id())
            ->with('products')
            ->get();

        foreach ($this->orders as $orderKey => $order) {
            $this->totalCounts[$orderKey] =  0;
            $this->totalPrices[$orderKey] =  0;

            foreach ($order->products as $productKey => $product) {
                $productsData = OrderProduct::where('order_id', $order['id'])
                    ->where('product_id', $product['id'])
                    ->first()
                    ->toArray();

                $this->orders[$orderKey]['products'][$productKey]['count'] = $productsData['count'];
                $this->orders[$orderKey]['products'][$productKey]['price'] = $productsData['price'] * $productsData['count'];

                $this->totalCounts[$orderKey] +=  $productsData['count'];
                $this->totalPrices[$orderKey] +=  $productsData['price'] * $productsData['count'];
            }
        }
    }

    public function render()
    {
        return view('livewire.pages.personal-account');
    }
}
