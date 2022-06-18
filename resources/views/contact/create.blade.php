@extends('layouts.app')
    @section('content')
        <div class="m-4">
            <form method="post" action="{{url('/contact')}}">
                {{ csrf_field() }}
                <div class="d-flex  justify-content-center">
                    <label>Email
                        <input type="text" id="email" class="form-control" name="email" value="{{old('email')}}" style="width: 500px;">
                    </label>
                </div>
                <div class="d-flex  justify-content-center">
                    <label>Subject
                        <input type="text" id="subject" class="form-control" name="subject" value="{{old('subject')}}" style="width: 500px;">
                    </label>
                </div>
                <div class="d-flex  justify-content-center">
                    <label>Message
                        <textarea type="text" id="message" class="form-control" name="message" cols="65" rows="8">{{old('name')}}</textarea>
                    </label>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-primary " >Send Message</button>
                </div>

            </form>
        </div>
     @endsection
