<?php

namespace App\Livewire\Forms\Products;

use App\Models\Product;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ProductForm extends Form
{
    public ?Product $product;

    #[Rule(['required'])]
    public ?string $name;

    #[Rule(['nullable', 'min:10'])]
    public ?string  $description;

    #[Rule(['required'])]
    public ?string $body;

    #[Rule(['required'])]
    public ?string $price;

    protected array $insideCategories;

    public function setProduct(Product $product)
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->body = $product->body;
        $this->price = number_format($product->price, 2, ',', '.');
    }

    public function setCategories(array $categories)
    {
        $this->insideCategories = $categories;
    }

    public function create(Product $product)
    {
        $this->validate();

        //$this->all() / $this->except('name') / $this->only('name', 'price')
        $product = $product::create([
            'name' => $this->name,
            'description' => $this->description,
            'body' => $this->body,
            'price' => $this->priceToFloat($this->price)
        ]);

        $product->categories()->sync(array_keys($this->insideCategories, 1));

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $dataUpdate = $this->except('product', 'categories');
        $dataUpdate['price'] = $this->priceToFloat($dataUpdate['price']);

        $this->product->update($dataUpdate);

        $this->product->categories()->sync(array_keys($this->insideCategories, 1));
    }

    private function priceToFloat(string $price): float
    {
        return (float) str_replace(['.', ','], ['', '.'], $price);
    }
}
