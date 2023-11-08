<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Menu extends Component
{
    use WithPagination;
    public $search = '';
    public $searchOn = false;

    public function render()
    {
        return view('livewire.menu', [
            'products' => Product::where('name', 'like', '%' . $this->search . '%')->paginate(6),
        ]);
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
