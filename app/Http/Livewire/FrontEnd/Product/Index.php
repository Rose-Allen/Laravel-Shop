<?php

namespace App\Http\Livewire\FrontEnd\Product;

use Livewire\Component;

class Index extends Component
{
    public $products, $category;
    public function mount($products, $category)
    {
        $this->products = $products;
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.front-end.product.index', [
            'products'=>$this->products,
            'category'=>$this->category,
        ]);
    }
}
