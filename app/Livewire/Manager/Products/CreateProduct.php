<?php

namespace App\Livewire\Manager\Products;

use App\Livewire\Forms\Products\ProductForm;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateProduct extends Component
{
    public ProductForm $form;

    public $allCategories;

    public $categories = [];

    public function mount(Category $category)
    {
        $this->allCategories = $category->pluck('name', 'id');
    }

    public function syncProduct(Product $product)
    {
        $this->form->setCategories($this->categories);
        $this->form->create($product);

        $this->categories = [];

        session()->flash('success', 'Produto Criado com Sucesso!');
    }

    public function render()
    {
        return view('livewire.manager.products.form');
    }
}
