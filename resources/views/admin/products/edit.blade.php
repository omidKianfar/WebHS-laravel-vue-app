@extends('admin.main')
    @section('content')
        <div class="container">
            <div class="d-flex justify-content-between">
                <a class="btn  nav-link text-dark" href="{{route('products.show',$product->id)}}">Show</a>
                <a class="btn  nav-link text-dark  " href="{{Route('products.index')}}">Products index</a>
            </div>
            <h3 class="text-center p-3">Edit Product</h3>
            <form action="{{Route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data" >
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="  d-flex  justify-content-center">
                    <label>Product image
                        <input class="form-control" type="file" name="image[]" multiple="multiple" value="{{old('image') ?? $product->image}}" style="width: 500px;" title="If you wana new images upload your selected images but you dont want new images its has last images">
                    </label>
                </div>
                <div class="  d-flex  justify-content-center">
                    <label>Title
                        <input type="text" class="form-control" name="title"  value="{{old('title') ?? $product->title}}" style="width: 500px;">
                    </label>
                </div>
                <div class="  d-flex  justify-content-center">
                    <label>Description
                        <input type="text" class="form-control"  name="description"  value="{{old('description') ?? $product->description}}" style="width: 500px;">
                    </label>
                </div>
                <div class="  d-flex  justify-content-center">
                    <label>Price
                        <input type="number" class="form-control"  name="price"  value="{{old('price') ?? $product->price}}" style="width: 500px;">
                    </label>
                </div>
                <div class="  d-flex  justify-content-center">
                    <label>Stock
                        <input type="number" class="form-control"  name="stock"  value="{{old('stock') ?? $product->stock}}" style="width: 500px;">
                    </label>
                </div>

                <div class="  d-flex  justify-content-center">
                    <select name="status" id="" class="custom-select " style="width: 500px;">
                        <option value="available"  {{old('status')=='available' ? 'selected':($product->status == 'available' ? 'selected':'')}}>Available</option>
                        <option value="unavailable"  {{old('status')=='unavailable' ? 'selected':($product->status == 'unavailable' ? 'selected':'')}}>Unavailable</option>
                    </select>
                </div>
                <div class="  d-flex justify-content-center">
                    <button class="btn btn-primary m-2"  type="submit">Update Product</button>
                </div>
            </form>
        </div>
    @endsection
