@extends('layouts.app')
@section('title')
    All Movies
@endsection
@section('content')
<div class="container">
  <h3>All Movies</h3>
  <form action="/filter" method="get">
    <div class="row mt-4 mr-2 mb-1" style="float: right;">
      @csrf
      <div class="in-line">
        <label for="FilterAge">Filter Age</label>
        <select name="filter" >
          <option value="0">All Age</option>
          <option value="13">13+</option>
          <option value="21">21+</option>
        </select>
          <button type="submit" class="btn btn-primary">Filter</button>
      </div>
    </div>
  </form>
    <table class="table" id="table">
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
@section('scriptChart')
    <script>
      $(document).ready(function () {
        $('#table').DataTable({
        "ordering": false // false to disable sorting (or any other option)
        });
        $('.dataTables_length').addClass('bs-select');
      });
    </script>
@endsection

@section('extraJS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
@endsection