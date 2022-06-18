@extends('admin.main')
    @section('content')
        <div class="container">
            <div class="d-flex justify-content-end">
                <a class="btn  nav-link text-dark  " href="{{Route('products.index')}}">Products index</a>
            </div>
            <h3 class="text-center p-3">Create Product</h3>
            <form action="{{Route('products.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="  d-flex  justify-content-center">
                    <label>Product Image
                        <input class="mr-2 input-group-text" type="file" name="image[]" multiple="multiple" style="width: 500px;">
                    </label>
                </div>
                <div class="  d-flex  justify-content-center">
                    <label>Product Title
                        <input type="text" class="input-group-text" name="title" value="{{old('title')}}" style="width: 500px;">
                    </label>
                </div>
                <div class="  d-flex  justify-content-center">
                    <label>Product Description
                        <input type="text" class="input-group-text " name="description" value="{{old('description')}}" style="width: 500px;">
                    </label>
                </div>
                <div class="  d-flex  justify-content-center">
                    <label>Product Price
                        <input type="number" class="input-group-text " name="price" value="{{old('price')}}" style="width: 500px;">
                    </label>
                </div>
                <div class="  d-flex  justify-content-center">
                    <label>Product Stock
                        <input type="number" class="input-group-text " name="stock" value="{{old('stock')}}" style="width: 500px;">
                    </label>
                </div>
                <div class=" mb-3 d-flex justify-content-center">
                    <select name="status" id="" class="custom-select " style="width: 500px;">
                        <option value="" selected> Selected....</option>
                        <option value="available" {{old('status')=='available'? 'selected' :'' }} > Available</option>
                        <option value="unavailable" {{old('status')=='unavailable'? 'selected' :'' }}> Unavailable</option>
                    </select>
                </div>
                <div class=" mb-3 d-flex justify-content-center">
                    <button class="btn btn-primary "  type="submit">Create Product</button>
                </div>
            </form>
        </div>
    @endsection
