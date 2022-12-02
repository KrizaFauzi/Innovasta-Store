<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{

    public $products, $category, $brandInputs = [], $priceInput;

    public $min_price;
    public $max_price;

    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];

    public function mount($category)
    {
        $this->category = $category;

        $this->min_price = 1;
        $this->max_price = 100000;
    }

    public function render()
    {
        $this->products = Product::where('category_id',$this->category->id)
                            ->when($this->brandInputs, function($q) {
                                $q->whereIn('brand', $this->brandInputs);
                            })
                            ->when($this->priceInput, function($q) {
                                $q->when($this->priceInput == 'high-to-low', function($q2) {
                                    $q2->orderBy('selling_price','DESC');
                                })
                                ->when($this->priceInput == 'low-to-high', function($q2) {
                                    $q2->orderBy('selling_price','ASC');
                                });
                            })
                            ->whereBetween('original_price',[$this->min_price,$this->max_price])->orderBy('created_at', 'DESC')
                            ->where('status','0')
                            ->get();

        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
