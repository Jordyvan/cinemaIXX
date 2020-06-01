@extends('layouts.app')
@section('title')
    Room List
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3 class="card-title">Room List</h3>
        </div>
        <div class="col-md-2">
            <a href="/addRoom">
                <button type="submit" class="btn btn-primary mb-3" style="float: right" > Add Room</button>  
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
            <th scope="col">Room Number</th>
            <th scope="col">Room Capacity</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($room as $r)
            <tr>
            <th scope="row">{{ $loop->iteration}}</th>
                <td>{{ $r->ruangan_id }}</td>
                <td>{{ $r->ruangan_capacity }}</td>
                <td>
                    <form action="/room/{{ $r->ruangan_id  }}" method="post" class="d-inline">
                        @method('patch')
                        @csrf
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                    <form action="/room/{{ $r->ruangan_id  }}" method="post" class="d-inline">
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