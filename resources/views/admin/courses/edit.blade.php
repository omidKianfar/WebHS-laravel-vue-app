@extends('admin.main')
    @section('content')
        <div class="d-flex justify-content-between mb-2">
            <a class="btn nav-link text-dark" href="{{route('courses.show',$course->id)}}">Show</a>
            <a class="btn  nav-link text-dark " href="{{Route('courses.index')}}">Cource index</a>
        </div>
        <div class="container"> <h3 class="text-center p-3 ">Edit course</h3>
            <form action="{{Route('courses.update',$course->id)}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class=" d-flex  justify-content-center">
                    <label>Upload image
                        <input class="form-control" type="file" name="image" value="{{old('image') ?? $course->image}}" style="width: 500px;" title="For upload new course image and delete last image">
                    </label>
                </div>
                <div class=" d-flex  justify-content-center">
                    <label>Title
                        <input type="text" class="form-control" name="title"  value="{{old('title') ?? $course->title}}" style="width: 500px;">
                    </label>
                </div>
                <div class=" d-flex  justify-content-center">
                    <label>Description
                        <input type="text" class="form-control"  name="description"  value="{{old('description') ?? $course->description}}" style="width: 500px;">
                    </label>
                </div>
                <div class=" d-flex justify-content-center">
                    <button class="btn btn-primary m-2"  type="submit">Update course</button>
                </div>
            </form>
        </div>
    @endsection
