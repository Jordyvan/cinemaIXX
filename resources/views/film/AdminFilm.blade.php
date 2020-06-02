@extends('layouts.app')
@section('title')
    All Movies
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3 class="card-title">All Movies</h3>
        </div>
        <div class="col-md-2">
            <a href="/addfilm">
                <button type="submit" class="btn btn-primary mb-3" style="float: right" > Add Movie</button>  
            </a>
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Room Number</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($film as $f)
            <tr>
            <th scope="row">{{ $loop->iteration}}</th>
                <td>{{ $f->film_title }}</td>
                <td>{{ $f->ruangan_id }}</td>
                <td>
                    <form action="/movie/form/{{ $f->film_id  }}" method="get" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                    <form action="/movie/{{ $f->film_id  }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>

                </td>
            </tr> 
          @endforeach
        </tbody>
      </table>  
</div>
@endsection