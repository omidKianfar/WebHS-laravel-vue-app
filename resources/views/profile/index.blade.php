@extends('layouts.app')
    @section('content')
        <div class="row d-flex m-3">
            <div class="col-6">
                <form class="d-inline " action="{{ route('profile.destroy', $user->id)}}" method="post" title="delete Image">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                    <button class="btn  btn-danger " style="width: 100%;" type="submit" >Delete image</button>
                </form>
                @if (Auth::user()->profile->image =='')
                        <img class="rounded" src="{{asset('https://www.google.com/search?q=empty+user+image&client=opera&hs=xii&sxsrf=ALeKk00zJYb-SGnN58N5sVrP7WA-Co4Zdg:1625554691225&tbm=isch&source=iu&ictx=1&fir=WjM27IN1p2VJzM%252CMG0JGB0B8kPXNM%252C_&vet=1&usg=AI4_-kRehjVeIRopSPs-G5oXRAcdS6lLTQ&sa=X&ved=2ahUKEwjSsLuP783xAhXZilwKHS4nADwQ9QF6BAgNEAE#imgrc=WjM27IN1p2VJzM')}}" style="width: 100%;height: 100%;">
                @else
                    <img class="rounded" src="{{asset('uploads/user-img')}}/{{ Auth::user()->profile->image }}" style="width: 100%;height: 100%;">
                @endif
            </div>
            <div class="col-6">
                <div class="card ">
                    <div class="card-body " >

                        <div class="d-flex justify-content-center">
                            <label class="mr-2">name:</label>
                            <p >{{$user->name}}</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <label class="mr-2">family:</label>
                            <p>{{$user->family}}</p>
                        </div>
                        <div class="d-flex justify-content-center" style="margin-right: 90px;">
                            <label class="mr-2">Phone Number:</label>
                            <p>{{$user->phoneNumber}}</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <label class="mr-2">address:</label>
                            <p>{{$user->address}}</p>
                        </div>
                        <a  style="width: 100%;" class="btn  btn-success" href="{{route('profile.edit',$user->id)}}" title="For edit detiles product and upload new images use it">
                            Edit
                        </a>
                        <form class="d-inline " action="{{ route('profile.destroyAccount', $user->id)}}" method="post" title="delete Account">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <button   class="btn  btn-danger " type="submit" style="width: 100%;" >
                                Delete Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

