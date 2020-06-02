@extends('layouts.app')
@section('title')
    Form Update Movie
@endsection
@section('content')
<div class="container">
    <h3>Form Update Movie</h3>
    <form enctype="multipart/form-data" action="/movie/{{ $film->first()->film_id }}" method="POST" >
        @csrf
        <div class="form-group mt-2">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $film->first()->film_title }}" required>
            <input type="text" class="form-control" name="id" value="{{ $film->first()->film_id }}" hidden>
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
            <label for="duration">Duration</label>
            <input type="number" class="form-control" name="duration" value="{{ $film->first()->film_duration_minute }}" min="1" max="300" required >
            @error('duration')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="Trailer">Trailer Link</label>
            <input type="text" class="form-control" name="TrailLink"  value="{{ $film->first()->trailer_link }}" required >
            @error('TrailLink')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea type="text" class="form-control" rows="3"  name="Description"   required >{{ $film->first()->film_description }}</textarea>
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
            <input type="file"  name="file" class="form-input">
            @error('file')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <button class="btn btn-primary" style="float: right" type="submit">Submit</button>
    </form>
</div>
@endsection
