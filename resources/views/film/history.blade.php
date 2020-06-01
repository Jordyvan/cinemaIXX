@extends('layouts.app')
@section('title')
    History
@endsection
@section('content')
<div class="container">
  <h3>History</h3>
  @if ($ticket->count()>0)
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title Movie</th>
          <th scope="col">Room Number</th>
          <th scope="col">Seat</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($ticket as $t)
            
          <tr>
          <th scope="row">{{$loop->iteration}}</th>

            <td>{{\App\film::where(['film_id'=>$t->film_id])->first()->film_title }}</td>
            <td>{{\App\film::where(['film_id'=>$t->film_id])->first()->ruangan_id }}</td>
            <td>{{$t->seat}}</td>
          </tr> 
          @endforeach  
      </tbody>
    </table>  
  @else
      <h3>You Don't Have History</h3>
      <h3>Please Book some movie to show your history</h3>
  @endif
    
</div>
@endsection