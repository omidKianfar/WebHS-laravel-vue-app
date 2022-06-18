@extends('layouts.app')
    @section('content')
        <div class="container">
            <h3 class="text-center p-3 text-light">Edit profile</h3>
            <div class="d-flex justify-content-between">
                <a class="btn  nav-link" href="{{url('/')}}">
                    Home
                </a>
                <a class="btn  nav-link" href="{{Route('profile.index')}}">
                    Profile index
                </a>
            </div>
            <form action="{{Route('profile.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="  d-flex  justify-content-center">
                    <label >Upload image
                        <input style="width: 500px;" class=" form-control" type="file" name="image" value="{{old('image') ?? $user->image}}"title="For upload new user image and delete last image">
                    </label>
                </div>
                <div class="  d-flex  justify-content-center">
                    <label class="py-1">Name
                        <input style="width: 500px;" type="text" class="form-control" name="name"  value="{{old('name') ?? $user->name}}">
                    </label>
                </div>
                <div class="  d-flex  justify-content-center">
                    <label class="py-1">Family
                        <input style="width: 500px;" type="text" class="form-control "  name="family"  value="{{old('family') ?? $user->family}}">
                    </label>
                </div>
                <div class=" d-flex  justify-content-center">
                    <label class="py-1">Phone Number
                        <input style="width: 500px;" type="number"  class="form-control "  name="phoneNumber"  value="{{old('phoneNumber') ?? $user->phoneNumber}}">
                    </label>
                </div>
                <div class="  d-flex  justify-content-center">
                    <label class="py-1">Address
                        <input style="width: 500px;" type="text" class="form-control "  name="address"  value="{{old('address') ?? $user->address}}">
                    </label>
                </div>
                <div class="  d-flex justify-content-center mb-3">
                    <button class="btn btn-primary "  type="submit">Update profile</button>
                </div>
            </form>
        </div>
    @endsection
