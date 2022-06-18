@extends('layouts.app')
    @section('content')
        <div class="d-flex bg-info  justify-content-between">
            <a class="btn btn-success m-2 btn-outline-dark" href="{{route('orders.create')}}">Start Order</a>
            <h4 class="m-2">Cart Total: <strong>${{$cart->total}}</strong> </h4>
            <h4>
                <a class="btn btn-lg nav-link text-dark" href="{{url('/products')}}">
                    Back
                </a>
            </h4>
        </div>
        <div class="row mx-auto justify-content-around " >
            @foreach ($cart->products as $product)
            <div class="col-4 d-flex ">
                <div class="card mb-4 mt-4  box-shadow " >
                    <img class="card-img-top"style="width:100%;height:40%;" src="{{asset('uploads/product-img/'.$product->images->first()->path)}}">
                    <div class="card-body ">
                        <h6 class="text-right" ><strong>$ {{$product->price}}</strong></h6>
                        <h6 class=" card-title">Title: {{$product->title}}</h6>
                        <p class="card-text" >Description: {{Str::limit($product->description, 20)}}</p>
                        <p class="text-right"><strong>{{$product->stock}} </strong>All in be in product</p>
                        <p class="card-text">You choose <strong>{{$product->pivot->quantity}}</strong> in your cart and its total: <strong>(${{$product->total}})</strong></p>
                        <form class="d-inline" action="{{Route('products.cart.destroy',[$product->id,$cart->id])}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger mb-1" style="width: 100%" type="submit">Remove all this cart</button>
                        </form>
                        <form class="d-inline" action="{{Route('products.cart.update',[$product->id,$cart->id])}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <button class="btn btn-warning" style="width: 100%" type="submit">Mines qouantity</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endsection
