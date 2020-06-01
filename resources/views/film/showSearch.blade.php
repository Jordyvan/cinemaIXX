@extends('layouts.app')
@section('title')
    Search
@endsection
@section('content')
<div class="container">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Room Number</th>
            <th scope="col">Age Restriction</th>
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
                  @if($f->film_age == 0)
                            All Age
                        @else
                            @if ($f->film_age == 13)
                                13+
                            @else
                                21+
                            @endif
                        @endif
                </td>
                <td>
                      <a href="/ShowMovies/{{ $f->film_id }}" class="badge badge-primary">Details</a>
                </td>
            </tr> 
          @endforeach
        </tbody>
      </table>  
</div>
@endsection