<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Services\CartService;

class ProductCartController extends Controller
{
    public $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService=$cartService;
    }
    public function store( Product $product)
    {
        $cart=$this->cartService->getFromCookieOrCreate();

        $quantity=$cart->products()
        ->find($product->id)
        ->pivot
        ->quantity ?? 0;

        $cart->products()->syncWithoutDetaching([
            $product->id =>['quantity'=>$quantity+request('number')]
        ]);
        $cookie=$this->cartService->makeCookie($cart);
        return redirect()->back()->cookie($cookie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Cart $cart)
    {
        $cart->products()->detach($product->id);
        $cookie=$this->cartService->makeCookie($cart);
        return redirect()->back()->cookie($cookie);
    }

    public function update( Product $product, Cart $cart)
    {
        $cart=$this->cartService->getFromCookieOrCreate();

        $quantity=$cart->products()
        ->find($product->id)
        ->pivot
        ->quantity ?? 0;

        $cart->products()->syncWithoutDetaching([
            $product->id =>['quantity'=>$quantity-1]
        ]);
        $cookie=$this->cartService->makeCookie($cart);
        return redirect()->back()->cookie($cookie);
    }

}
