@extends('layouts.app')
    @section('content')
        <div  class="d-flex p-2 bg-info justify-content-between">
            <a class="btn btn-success btn-outline-dark m-2" href="{{Route('carts.index')}}">
                Go to Cart page
            </a>
            <h4 class="nav-link text-dark  ">
                @inject('cartService', 'App\services\CartService')
                Your choosed carts: {{$cartService->countProducts()}}
            </h4>
        </div>
        <div class="row mx-auto justify-content-around " >
            @foreach ($products as $product)
                <div class="col-4 d-flex ">
                    <div class="card mb-4 mt-4  box-shadow " style="width:300px;height300px;">
                        <div id="carousel{{$product->id}}" class="carousel slide ">
                            <div  class="carousel-inner">
                                @foreach ($product->images as $image)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img class=" card-img-top"style="width:100%;height:150px;" src="{{asset('uploads/product-img/'.$image->path)}}">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carousel{{$product->id}}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel{{$product->id}}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="card-body ">
                            <h6 class="text-right" ><strong>$ {{$product->price}}</strong></h6>
                            <h6 class=" card-title">Title: {{$product->title}}</h6>
                            <p class="card-text" >Description: {{ $product->description}}</p>
                            <p class="text-right"><strong>{{$product->stock}} </strong>items be in all product</p>
                            <form class="d-inline" action="{{Route('products.cart.store',$product->id)}}" method="POST">
                                {{ csrf_field() }}
                                <input type="number" class="form-control mb-2" placeholder="How many add item" name="number" title="If you choosen until 3 item available stock its ok else its have error" value="{{old('number')}}">
                                <button class="btn btn-success" type="submit" style="width:100%;">Add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
