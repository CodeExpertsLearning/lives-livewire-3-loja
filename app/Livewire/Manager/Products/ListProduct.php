<?php

namespace App\Livewire\Manager\Products;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ListProduct extends Component
{
    use WithPagination;

    public function render(Product $product)
    {
        $products = $product->paginate(10);

        return view(
            'livewire.manager.products.list-product',
            compact('products')
        );
    }
}
