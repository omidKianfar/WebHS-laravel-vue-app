@extends('admin.main')
    @section('content')
        <div class="d-flex justify-content-between mb-2">
            <a class="btn nav-link text-dark" href="{{route('products.edit',$product->id)}}"  title="For edit detiles product and upload new images use it">Edit detailes and add new image</a>
            <a class="btn  nav-link text-dark " href="{{Route('products.index')}}">Products index</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-8 mt-2 p-1">
                    <div class="row d-flex justify-content-around bg-white rounded border">
                        @forelse ($product->images as $image)
                            <div class="col-3 p-2">
                                <img  class=" rounded mb-1" style="width: 150px;height: 100px;" src="{{asset("uploads/product-img/".$image->path)}} ">
                                <form class="d-inline" action="{{ route('products.destroyImage', $image->id)}}" method="post" title="For delete product image use it">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                    <input class="btn btn-sm btn-danger " type="submit" value="Delete">
                                </form>
                            </div>
                        @empty
                            <div class="alert alert-warning">
                                Products has no image
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="col-4 py-1">
                    <div class="card mt-2 ">
                        <div class="card-body " >
                            <div class="d-flex justify-content-center">
                                <label class="mr-2">Title:</label>
                                <h6 class="text-center">{{$product->title}}</h6>
                            </div>
                            <div class="d-flex justify-content-center">
                                <label class="mr-2">Description:</label>
                                <p class="text-center">{{$product->description}}</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <label class="mr-2">Price:</label>
                                <p class="text-center">{{$product->price}}</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <label class="mr-2">Stock:</label>
                                <p class="text-center">{{$product->stock}}</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <label class="mr-2">Status:</label>
                                <p class="text-center">{{$product->status}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
