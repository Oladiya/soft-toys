<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $category;
    public $price;
    public $brand;
    public $size;
    public $view;
    public $type;
    public $design_and_construction;
    public $image;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['nullable', 'string', 'max:255'],
            'price' => ['int', 'required'],
            'brand' => ['required', 'string', 'max:255'],
            'size' => [
                'required',
                'string',
                \Illuminate\Validation\Rule::in([
                    'small',
                    'medium',
                    'large',
                ]),
            ],
            'view' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'design_and_construction' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'dimensions:ratio=1/1'],
        ];
    }

    public function messages()
    {
        return [
            'name' => [
                'max' => 'Название должно состоять не более чем из 255 символов.',
                'string' => 'Название должно быть текстом.',
                'required' => 'Название обязательно!',
            ],
            'description' => [
                'required' => 'Описание обязательно!',
                'string' => 'Описание должно быть текстом.',
            ],
            'category' => [
//                'nullable' => '',
                'string' => 'Категория должна быть тектом.',
                'max' => 'Категория должна состоять не более чем из 255 символов.',
            ],
            'price' => [
                'int' => 'Цена должна быть числом.',
                'required' => 'Цена обазательна!',
            ],
            'brand' => [
                'required' => 'Бренд обязателен!',
                'string' => 'Бренд должен быть текстом.',
                'max' => 'Бренд должен состоять не более чем из 255 символов.',
            ],
            'size' => [
                'required' => 'Размер обязателен!',
                'string' => 'Размер должен быть текстом.',
//                'in' => '',
            ],
            'view' => [
                'required' => 'Вид обязателен!',
                'string' => 'Вид должен быть текстом.',
                'max' => 'Вид должен состоять не более чем из 255 символов.',
            ],
            'type' => [
                'required' => 'Тип обязателен!',
                'string' => 'Тип должен быть текстом.',
                'max' => 'Тип должен состоять не более чем из 255 символов.',
            ],
            'design_and_construction' => [
//                'nullable' => '',
                'string' => 'Дизайн и конструкция должны быть записаны в виде текста.',
                'max' => 'Дизайн и конструкция должны состоять не более чем из 255 символов.',
            ],
            'image' => [
                'required' => 'Изображение обязательно!',
                'image' => 'Изображение должно быть изображением!',
                'dimensions:ratio=1/1' => 'Изображение должно быть квадратным.',
            ],
        ];
    }

    public function save()
    {
        $validated = $this->validate();

        $path = $this->image->store('public/product-images');

        unset($validated['image']);

        $validated += ['img_uri' => $path];

        $product = Product::create($validated);

        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.pages.products.create');
    }
}
