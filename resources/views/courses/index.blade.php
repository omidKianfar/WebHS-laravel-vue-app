@extends('layouts.app')
    @section('content')
        <div class="container">
            <search-course-component class="mt-2"></search-course-component>
            <div class="row d-flex mt-2 justify-content-around">
                <div class="col-9 ">
                    <div class="row justify-content-around " >
                        @foreach ($courses as $course)
                            <div class="col-3 border m-1" style="width: 300px;height: 350px;">
                                <img style="width: 100%;height: 30%;" src='{{asset("uploads/course-img/".$course->image)}}'>
                                <h4  >{{$course->title}}</h4>
                                <p  style="overflow-wrap: break-word">{{Str::limit($course->description,100)  }}</p>
                                <a class="btn btn-info m-3 "  href="{{$course->title}}.html">View</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-2 border mt-1" >
                    <p class="text-light text-center p-2 bg-info rounded-bottom">list of cource links</p>
                    <ul class="p-2 list-unstyled" >
                        @foreach ($courses as $course)
                            <li>
                                <a style="font-size: 20px;" href="{{$course->title}}.html">{{$course->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endsection
