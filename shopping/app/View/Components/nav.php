<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Cart;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Classify;


class nav extends Component
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
        $cart = new Cart();
        $carts = $cart->getCarts();
        $totalqtt = $cart->getTotal();
        $totalprice = $cart->getTotal(true);
        return view('components.nav',compact('carts','totalqtt','totalprice','categories'));
    }
    
}
