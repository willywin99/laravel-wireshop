<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

use App\Product;

class Create extends Component
{
    public $title;
    public $description;
    public $price;
    public $image;

    public function render()
    {
        return view('livewire.product.create');
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|min:3',
            'description' => 'required|max:180',
            'price' => 'required|numeric'
        ]);

        Product::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        $this->emit('productStored');
    }
}
