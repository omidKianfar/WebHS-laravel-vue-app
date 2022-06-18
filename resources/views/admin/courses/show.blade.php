@extends('admin.main')
    @section('content')
        <div class="d-flex justify-content-between mb-2">
            <a class="btn nav-link text-dark" href="{{route('courses.edit',$course->id)}}" title="For update course detiles and upload new course image ">Edit</a>
            <a class="btn  nav-link text-dark  " href="{{Route('courses.index')}}">Cource index</a>
        </div>
        <div class="row mx-auto justify-content-around " >
            <div class="card mb-4 mt-4  box-shadow " style="width: 500px;height: 450px;">
                <div class="card-img-top">
                    <img  class="rounded" style="width: 100%;height: 100%;" src="{{asset("uploads/course-img/".$course->image)}} ">
                </div>
                <div class="card-body " >
                    <div class="d-flex justify-content-center">
                        <label class="mr-2">Title:</label>
                        <h6 class="text-center">{{$course->title}}</h6>
                    </div>
                    <div class="d-flex justify-content-center">
                        <label class="mr-2">Description:</label>
                        <p class="text-center">{{$course->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endsection
