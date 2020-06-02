@extends('layouts.app')
@section('title')
    Booking List
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3 class="card-title">Booking List</h3>
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
            <th scope="col">Booking ID</th>
            <th scope="col">Email</th>
            <th scope="col">Film Title</th>
            <th scope="col">Seat ID</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($booking as $r)
            <tr>
            <th scope="row">{{ $loop->iteration}}</th>
                <td>{{ $r->booking_id }}</td>
                <td>{{\App\User::where(['id'=>$r->user_id])->first()->email }}</td>
                <td>{{\App\film::where(['film_id'=>$r->film_id])->first()->film_title }}</td>
                <td>{{\App\seat::where(['seat_id'=>$r->seat_id])->first()->seat_rows.\App\seat::where(['seat_id'=>$r->seat_id])->first()->seat_columns }}</td>
                <td>
                    <form action="/ticket/{{ $r->booking_id }}" method="post" class="d-inline">
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