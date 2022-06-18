@extends('layouts.main')

    <h1>Tnx For your message.</h1>
    <hr class="featurette-divider">
    <p><strong>Email: </strong>{{$data['email']}}</p>
    <hr class="featurette-divider">
    <p><strong>subject: </strong><br>{{$data['subject']}} </p>
    <hr class="featurette-divider">
    <p><strong>Message:<br> </strong>{{$data['message']}}</p>


