@extends('layouts.app')
    @section('content')
                            <!--carousel-->
        <div id="WelcomeCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" >
                @foreach( $courses as $course )
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img style="width:100%;height:500px;" src="{{asset('uploads/course-img/'.$course->image)}} ">
                    <div class="carousel-caption ">
                        <a class="btn btn-lg btn-primary"  href="{{$course->caption}}.html">Start Learn {{$course->title}}</a>
                    </div>
                </div>
                @endforeach
            </div>
                <a class="carousel-control-prev" href="#WelcomeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#WelcomeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
                                     <!-- Front and Back description -->
    <div class=" continer">

        <h2 v-on:mouseover="fontSize=!fontSize,highlight=!highlight" v-on:mouseleave="fontSize=!fontSize,highlight=!highlight" :class="{fontSize,highlight}" class=" text-center p-3 m-5">Web development</h2>
        <div class="jumbotron">
            <p class="pl-2" style="font-size: 16px;" >this site create for any people needs learn development and i try to explane better and easily for any type of development for personality goal.
                I start from web development because its easy and most people needs that for work or seles any things or computer students for go to apply a job.
                i try show best refrences I find and show good exampele and my problem in this revelotion to find a job.
            </p>
            <p  class="pl-2" style="font-size: 16px;">in future I add so thing i kearn and create youtube chanel to free learn and many other things about my revelotion for you.</p>
            <p  class="pl-2" style="font-size: 16px;">Web development is about create a web site. I want explane easily about this type of development for any body needs it.</p>
        </div>
        <p v-on:mouseover="textCenter=!textCenter" v-on:mouseleave="textCenter=!textCenter" :class="{textCenter}" class="pl-2" style="font-size: 16px;">This section explain about all things in web developmemt.</p>
        <div class="jumbotron">
            <h4 class=" bg-info text-dark rounded p-2">Front End</h4>
            <div class="col">
                <h6 class="p-2 text-dark   bg-success rounded">Front End in development is a evry thing you see in your monitor.</h6>
                <ul class="p-2  list-unstyled  ">
                    <li class="p-2 "><mark class="rounded">HTML</mark> for create inputs and ...   .</li>
                    <li class="p-2"><mark class="rounded">CSS</mark> for create yor style for Html   .</li>
                    <li class="p-2"><mark class="rounded">Bootstrap</mark>  is Easy way to design your page with ready HTML and CSS by ready sampele code.</li>
                </ul>
            </div>
            <h4 class=" bg-info text-dark rounded  p-2">Back End</h4>
            <div class="col">
                <h6 class="p-2 text-dark  bg-success rounded">Back End is controll your Front End toterials.</h6>
                <ul class="p-2  list-unstyled ">
                    <li class="p-2"><mark class="rounded">JavaScript</mark> or JS is a Back End language.Use for page event.</li>
                    <li class="p-2"><mark class="rounded">JavaQuery</mark> or JQuery is one of more library of JS.Its has many ready JS code for write short and fast code.</li>
                    <li class="p-2"><mark class="rounded">PHP</mark> is a Back End language.Use for  math or DataBase amd ... for your page.</li>
                    <li class="p-2"><mark class="rounded">Laravel</mark> is a farmwork of PHP.Its use MVC model, so easy code technic, have code template and is best framworl of PHP.</li>
                </ul>
            </div>
        </div>
                                                        <!-- course -->
        <h2 v-on:mouseover="fontSize=!fontSize,highlight=!highlight" v-on:mouseleave="fontSize=!fontSize,highlight=!highlight" :class="{fontSize,highlight}" class=" text-center p-2">Courses</h2>
        <div class="row justify-content-around " >
            <div class="col-9 ">
                @foreach ($courses as $course)
                    <div class="col-12 border mt-1 ">
                        <img class="rounded float-right m-2"style="width:200px;height:150px;" src='{{asset("uploads/course-img/".$course->image)}}'>
                        <h4 class=" bg-info p-3 rounded-top" >{{$course->title}}</h4>
                        <p class="p-2 " style="overflow-wrap: break-word">{{ $course->description  }}</p>
                        <a class="btn btn-info m-3 "  href="{{$course->title}}.html">View</a>
                    </div>
                @endforeach
                <a class="btn btn-success mt-1 mb-1" style="width: 100%;" href="{{ route('allCourse') }}">All Courses</a>
                </div>
        </div>
        <h2 v-on:mouseover="fontSize=!fontSize,highlight=!highlight" v-on:mouseleave="fontSize=!fontSize,highlight=!highlight" :class="{fontSize,highlight}" class=" text-center p-2 mt-5">Products</h2>
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
                </div>
                </div>
            </div>
            @endforeach
            <a class="btn btn-success mt-1 mb-1 justify-content-around" style="width: 90%;" href="{{ route('allProducts') }}">All Products</a>
        </div>
        @include('content.footer')
    @endsection

