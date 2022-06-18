@extends('admin.main')
    @section('content')
        <div class="container">
            <div class="d-flex justify-content-end">
                <a class="btn  nav-link text-dark " href="{{Route('courses.index')}}">Back</a>
            </div>
            <h3 class="text-center p-3 ">Create course</h3>
            <form action="{{Route('courses.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="d-flex  justify-content-center">
                    <label>Upload image
                        <input class="form-control" type="file" name="image" title="For upload course image " style="width: 500px;">
                    </label>
                </div>
                <div class=" mb-3 d-flex  justify-content-center">
                    <label>Title
                        <input type="text" class="form-control" name="title" value="{{old('title')}}" style="width: 500px;">
                    </label>
                </div>
                <div class=" mb-3 d-flex  justify-content-center">
                    <label>Description
                        <input type="text" class="form-control" name="description" value="{{old('description')}}" style="width: 500px;">
                    </label>
                </div>
                <div class=" d-flex justify-content-center">
                    <button class="btn btn-primary m-2"  type="submit">Create course</button>
                </div>
            </form>
        </div>
    @endsection
