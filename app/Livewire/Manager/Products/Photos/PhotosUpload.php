<?php

namespace App\Livewire\Manager\Products\Photos;

use App\Models\{ProductPhoto, Product};
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PhotosUpload extends Component
{
    use WithFileUploads;

    #[Rule(['photos.*' => 'image'])]
    public $photos = [];

    public function savePhotos(ProductPhoto $productPhoto)
    {
        $this->validate();

        //To-DO: receber referencia do produto editado
        $product = Product::first()->id;

        //To-DO: Extraí comportamento do upload do componente...
        foreach ($this->photos as $photo) {
            $productPhoto::create([
                'product_id' => $product,
                'photo'      => $photo->store('products', 'public'),
            ]);
        }

        session()->flash('success', 'Imagens salvas com sucesso!');
    }

    public function render()
    {
        return view('livewire.manager.products.photos.photos-upload');
    }
}
