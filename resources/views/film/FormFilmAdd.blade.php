@extends('layouts.app')
@section('title')
    Form Add Movie
@endsection
@section('content')
<div class="container">
    <h3>Form Add Movie</h3>
    @if ($ruangan->count() != 0)
    <form action="/movie/addfilm" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-group mt-2">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{old('duration')}}" required>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="age">Age Restriction</label>
                <select  name="age" class="form-control">
                    <option value="0">0</option>
                    <option value="13">13</option>
                    <option value="21">21</option>
                </select>
            </div>
            <div class="form-group">
                <label for="duration">Duration(in minutes)</label>
            <input type="number" class="form-control" name="duration" value="{{old('duration')}}" min="1" max="300" required >
                @error('duration')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="Trailer">Trailer Link</label>
                <input type="text" class="form-control" name="TrailLink"  value="{{old('duration')}}" required >
                @error('TrailLink')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="room">Room Number</label>
                <select  name="room" class="form-control">
                    @foreach ($ruangan as $r)
                        <option value="{{$r->ruangan_id}}">{{$r->ruangan_id}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="Description">Description</label>
                <textarea type="text" class="form-control" rows="3"  name="Description"   required >{{old('Description')}}</textarea>
                @error('Description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="Trailer">Movie Image</label>
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
    @else
        <h3>No Room Available to Add new Film</h3>
        <h3>Please Create The New Room First</h3>
    @endif   

    
</div>
@endsection