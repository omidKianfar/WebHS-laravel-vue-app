@extends('layouts.app')
    @section('content')
        <div class="p-2 d-flex justify-content-around bg-info">
            <form class="d-inline "action="{{Route('order.payments.store',$order->id)}}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-lg btn-success " style="width: 100%;" type="submit">
                    Pay
                </button>
            </form>
            <h4 class="text-center m-2 "><strong>Grand Total:</strong> ${{$order->total}}</h4>
                <a class="btn btn-lg nav-link text-dark" href="{{route('orders.create')}}">Back</a>
            </div>
    @endsection
