<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $products = [];
    public $totalCount = 0;
    public $totalPrice = 0;
    public $address;
    public $full_name;

    public function rules()
    {
        return [
            'address' => ['required', 'string', 'max:255'],
            'full_name' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'address' => [
                'max' => 'Адрес должен состоять не более чем из 255 символов.',
                'string' => 'Адрес должен быть текстом.',
                'required' => 'Адрес обязателен!',
            ],
            'full_name' => [
                'max' => 'ФИО должно состоять не более чем из 255 символов.',
                'string' => 'ФИО должно быть текстом.',
                'required' => 'ФИО обязательно!',
            ],
        ];
    }

    public function mount(Request $request)
    {
        if (!$request->session()->has('cart')) {
            $this->redirect(route('cart'), navigate: true);
        }

        $cart = $request->session()->get('cart');

        foreach ($cart as $key => $item) {
            $product = Product::find($item['id']);
            $this->products[$key] = $product->toArray();
            $this->products[$key]['count'] = $item['count'];
            $this->products[$key]['totalPrice'] = $item['count'] * $product->price;

            $this->totalCount += $item['count'];
            $this->totalPrice += $this->products[$key]['totalPrice'];
        }
    }

    public function render()
    {
        return view('livewire.pages.orders.create');
    }

    public function save(Request $request)
    {
        $validated = $this->validate();

        $orderData = [
            'address' => $validated['address'],
            'full_name' => $validated['full_name'],
            'user_id' => Auth::id(),
            'total_price' => $this->totalPrice,
            'status' => 'оформлен',
        ];

        $order = Order::create($orderData);

        foreach ($this->products as $product) {
            $productData = [
                'product_id' => $product['id'],
                'order_id' => $order->id,
                'count' => $product['count'],
                'price' => $product['price'],
            ];

            OrderProduct::create($productData);
        }

        $request->session()->forget('cart');

        $this->redirect(route('personal-account'), navigate: true);
    }
}
