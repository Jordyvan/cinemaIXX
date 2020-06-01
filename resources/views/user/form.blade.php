@extends('layouts.app')
@section('title')
    Form Edit User
@endsection
@section('content')
<div class="container">
    <h3>Form Edit User</h3>
    <div class="col-4 m-auto">
        <form action="/editProfile/{{Auth::user()->id}}" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-group mt-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="date" >{{ __('Birth Date') }}</label>
                <input id="date" type="date" class="form-control" name="birth_date" value="{{Auth::user()->birth_date}}" required >
                @error('birth_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="Trailer">Profile Picture</label>
            </div>

            <div class="form-group">
                <input type="file"  name="file"  required >
                @error('file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <button class="btn btn-primary" style="float: right" type="submit">Submit</button>
        </form>
 

    </div>
</div>
@endsection