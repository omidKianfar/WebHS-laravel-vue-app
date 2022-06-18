<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService=$cartService;
        $this->middleware('auth');
    }
    public function create(){
        $cart=$this->cartService->getFromCookie();
        if(! isset($cart) || $cart->products->isEmpty()){
            return redirect()->back()->withErrors('Your cart is empty');
        }
        return view('products.orders.create',compact('cart'));
    }
    public function store(Request $request){
        return DB::transaction(function () use($request){
            $user=$request->user();
            $order=$user->orders()->create([
                'status'=>'pending'
            ]);
            $cart=$this->cartService->getFromCookie();
            $cartProductsWithQuantity=$cart
            ->products
            ->mapWithKeys(function($product){
                $quantity=$product->pivot->quantity;
                $product->decrement('stock', $quantity);
                $element[$product->id]=['quantity'=>$quantity];
                return $element;
            });
            $order->products()->attach($cartProductsWithQuantity->toArray());       
            return redirect()->route('order.payments.create',$order->id);
            });
      
    }
}
