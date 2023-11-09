<?php

namespace App\Livewire\Manager\Products;

use App\Livewire\Forms\Products\ProductForm;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('layouts.app')]
class EditProduct extends Component
{
    public ProductForm $form;

    public $allCategories;

    #[Rule(['array'])]
    public $categories = [];

    public function mount(Product $product, Category $category)
    {

        $this->allCategories = $category->pluck('name', 'id')->toArray();
        $this->categories = $product->categories->pluck('id')->toArray();
        $this->categories = array_fill_keys($this->categories, true);

        $this->form->setProduct($product);
    }

    public function syncProduct()
    {
        $this->form->setCategories($this->categories);
        $this->form->update();

        session()->flash('success', 'Produto Atualizado com Sucesso!');
    }

    public function render()
    {
        return view('livewire.manager.products.form');
    }
}
