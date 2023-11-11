<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Component;

class Cart extends Component
{
    public $cart = [];
    public $products = [];

    public function mount(Request $request)
    {
        $this->refreshProducts($request);
    }

    public function render(Request $request)
    {
        $this->refreshProducts($request);

        return view('livewire.cart');
    }

    public function addProduct($id, Request $request)
    {
        $found = false;

        if ($request->session()->has('cart')) {
            $this->cart = $request->session()->pull('cart');

            foreach ($this->cart as $key => $item) {
                if (!$found && $item['id'] === $id) {
                    $this->cart[$key]['count']++;
                    $found = true;
                }
            }
        }

        if (!$found && Product::find($id)) {
            $this->cart[] = [
                'id' => $id,
                'count' => 1,
            ];
        }

        $request->session()->put(['cart' => $this->cart]);
        $this->dispatch('update-cart-count');
    }

    #[On('subtract-from-cart')]
    public function subtractProduct($id, Request $request)
    {
        $found = false;

        if ($request->session()->has('cart')) {
            $this->cart = $request->session()->pull('cart');
            foreach ($this->cart as $key => $item) {
                if (!$found && $item['id'] === $id) {
                    if ($this->cart[$key]['count'] === 1) {
                        unset($this->cart[$key]);
                    } else {
                        $this->cart[$key]['count']--;
                    }
                    $found = true;
                }
            }
        }

        if (!$found) {
            //товар не найден в корзине, но было запрошено его удаление из корзины
        }

        $request->session()->put(['cart' => $this->cart]);
        $this->dispatch('update-cart-count');
    }

    protected function refreshProducts(Request $request)
    {
        $this->products = [];

        if ($request->session()->has('cart')) {
            $this->cart = $request->session()->get('cart');
            foreach ($this->cart as $key => $item) {
                $product = Product::find($item['id']);
                $this->products[$key] = $product;
                $this->products[$key]['count'] = $item['count'];
            }
        }
    }

    public function clearCart(Request $request)
    {
        $request->session()->forget('cart');
        $this->dispatch('update-cart-count');
    }
}
