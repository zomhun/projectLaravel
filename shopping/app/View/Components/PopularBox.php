<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class PopularBox extends Component
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

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $datacat = new Category;
        $categories = $datacat -> getselectcat();
        $cats = $datacat -> getselectcat() ->where('parent_id',0);
        $data = Product::search()->limit(8)->get();
        return view('components.popular-box', compact('data','categories','cats'));
    }
}
