<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use App\Models\OrderProduct;
use Livewire\Component;

class Index extends Component
{
    public $orders = [];
    public $totalCounts = [];
    public $totalPrices = [];

    public $statuses = [];
    public $availableStatuses = [];

    public function mount()
    {
        $this->getOrders();

        $this->availableStatuses = [
            'оформлен',
            'одобрен',
            'в сборке',
            'доставляется',
            'завершён',
            'отменён',
        ];
    }

    public function getOrders()
    {

        $this->orders = Order::all()->sortBy(function ($value, $key){
            switch ($value->status){
                case 'оформлен':
                    return 0;
                case 'одобрен':
                    return 1;
                case 'в сборке':
                    return 2;
                case 'доставляется':
                    return 3;
                case 'завершён':
                    return 4;
                case 'отменён':
                    return 5;
                default:
                    return 6;
            }
        });

        foreach ($this->orders as $orderKey => $order) {
            $this->totalCounts[$orderKey] = 0;
            $this->totalPrices[$orderKey] = 0;

            foreach ($order->products as $productKey => $product) {
                $productsData = OrderProduct::where('order_id', $order['id'])
                    ->where('product_id', $product['id'])
                    ->first()
                    ->toArray();

                $this->orders[$orderKey]['products'][$productKey]['count'] = $productsData['count'];
                $this->orders[$orderKey]['products'][$productKey]['price'] = $productsData['price'] * $productsData['count'];

                $this->totalCounts[$orderKey] += $productsData['count'];
                $this->totalPrices[$orderKey] += $productsData['price'] * $productsData['count'];
                $this->statuses[$orderKey] = $order->status;
            }
        }
    }

    public function render()
    {
        $this->getOrders();

        return view('livewire.pages.orders.index');
    }

    public function changeStatus(Order $order, string $status)
    {
        $order->status = $status;
        $order->save();
    }
}
