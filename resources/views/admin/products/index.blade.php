@extends('admin.main')
    @section('content')
        <h5>Products List</h5>
        <div class="d-flex justify-content-between m-4">
            <a class="btn  btn-success  " href="{{route('products.create')}}" title="For create product use it">Create Product</a>
            <a class="btn  nav-link text-dark" href="{{url('/products')}}">Products page</a>
        </div>
        <input class="form-control mb-2" id="dashboardsearch" type="text" placeholder="Search">
        <div class="table-responsive" id="myDashboardTable">
            <table class="table table-hover table-secondary rounded table-sm">
                <thead >
                    <th >Id</th>
                    <th>image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                </thead>
                @forelse ($products as $product)
                <tbody>
                    <td>{{$product->id}}</td>
                    <td>
                        @foreach ($product->images as $image)
                            <ul>
                                <li>{{Str::limit($image->path, 20)}}</li>
                            </ul>
                        @endforeach
                    </td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->status}}</td>
                    <td>
                        <a class="btn btn-sm btn-link" href="{{route('products.show',$product->id)}}" title="For show detiles product and manage images use it">
                            Show
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-link" href="{{route('products.edit',$product->id)}}" title="For edit detiles product and upload new images use it">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form class="d-inline" action="{{ route('products.destroy', $product->id)}}" method="post" title="For delete product and product images use it">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <input class="btn btn-sm btn-link " type="submit" value="Delete">
                        </form>
                    </td>
                </tbody>
                @empty
                <div class="alert alert-warning">
                    Products is empty
                </div>
                @endforelse
            </table>
        </div>
    @endsection
