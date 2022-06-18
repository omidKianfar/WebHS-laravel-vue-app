@extends('layouts.app')
    @section('content')
        <div class="d-flex justify-content-between  bg-info p-2">
            <form class="d-inline "action="{{Route('orders.store')}}"method="POST">
                {{ csrf_field() }}
                <button class="btn btn-success btn-outline-dark" type="submit">
                    Confirm order
                </button>
            </form>
            <h4 class="m-2 "><strong>Grand Total:</strong> ${{$cart->total}}</h4>
            <a class="btn btn-lg nav-link text-dark" href="{{route('carts.index')}}">Back</a>
        </div>
        <div class="m-2">
            <h2 class="p-3 text-center bg-light">Order Detailes</h2>
        </div>
        <div class="table-responsive" id="myDashboardTable">
            <table class="table table-hover text-center table-sm table-secondary ">
                <thead >
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </thead>
                @foreach($cart->products as $product)
                <tbody class="text-light">
                    <tr>
                        <td>
                            <img src="{{asset(asset('uploads/product-img/'.$product->images->first()->path))}}" width="100">
                        </td>
                        <td class="text-dark"><strong>{{$product->title}}</strong></td>
                        <td class="text-dark"><strong>${{$product->price}}</strong></td>
                        <td class="text-dark"><strong>${{$product->pivot->quantity}}</strong></td>
                        <td class="text-dark"><strong>${{$product->total}}</strong></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endsection
