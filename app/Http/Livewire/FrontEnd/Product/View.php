<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component
{
    public $category, $product, $productColorSelectedQantity ;

    public function colorSelected($productColorId){
       $productColor =  $this->product->productColors()->where('id', $productColorId)->first();
       $this->productColorSelectedQantity =  $productColor->quantity;
       if($this->productColorSelectedQantity == 0){
           $this->productColorSelectedQantity = 'outOfStock';
       }
    }
    public function mount($category,$product ){
        $this->product = $product;
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'product'=>$this->product,
            'category'=>$this->category
        ]);
    }
}
