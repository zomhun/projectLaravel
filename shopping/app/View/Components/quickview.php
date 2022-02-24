<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productimage;

class quickview extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public $id;
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $id = 5;
        // $product = Product::findOrFail($id);
        $product = new Product;
        $dataproimg = Productimage::all()-> where('pro_id','=',$id);
        $productimgs = $dataproimg ;
        // $product['view'] = $product['view'] + 1;
        // Product::where('id', $id)->update([ 'view' => $product['view'] ]);
        return view('components.quickview', compact('product','productimgs'));
    }
}
