<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsSection extends Component
{
    public $items = [];

    public function mount()
    {
        $this->items = session()->get('cart', []);
    }


    public function addProdutsToCart(int $productId)
    {

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'quantity' => 1,
                'product' => Product::find($productId)
            ];
        }

        session()->put('cart', $cart);

        $this->dispatch('cart-added', ['cart' => $cart]);
    }



    public function render()
    {
        return view('livewire.products-section', [
            'products' => Product::with('category')->paginate(12)
        ]);
    }
}
