<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Menu extends Component
{
    use WithPagination;

    public $search = '';
    public $searchOn = false;
    public $cartCount;
    protected $listeners = ['add-to-cart'];

    public function render(Request $request)
    {
        $cart = $request->session()->get('cart');

        $this->cartCount = 0;
        if ($request->session()->has('cart')) {
            foreach ($cart as $item) {
                $this->cartCount += $item['count'];
            }
        }
        return view('livewire.menu', [
            'products' => Product::where('name', 'like', '%' . $this->search . '%')->paginate(6),
        ]);
    }

    #[On('update-cart-count')]
    public function updateCart(Request $request){

        $cart = $request->session()->get('cart');

        $this->cartCount = 0;
        if ($request->session()->has('cart')) {
            foreach ($cart as $item) {
                $this->cartCount += $item['count'];
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    public function showProduct($id)
    {
        $this->redirect(route('products.show', $id));
    }
}
