@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="m-auto text-center">
                <h3>Hello {{Auth::user()->name}}</h3>
                @if(Auth::user()->image_user)
                    <img src="{{ url('/img/'.Auth::user()->image_user) }}" class="card-img profile-img img-fluid img-shadow" alt="...">
                @else
                    <img src="{{ url('/img/avatar.png') }}" class="card-img profile-img img-fluid img-shadow" alt="...">
                @endif
                
            </div>
            <div class="m-auto text-center">
                <a href="/editProfile/{{Auth::user()->id}}" >
                    <button class="btn btn-primary" > Edit Profile</button>
                </a>
            </div>
        </div>
        <div class="col-4">
            
        </div>
    </div>
    
</div>
@endsection