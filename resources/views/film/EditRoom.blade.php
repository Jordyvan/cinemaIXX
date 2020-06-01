@extends('layouts.app')
@section('title')
    Edit Room
@endsection

@section('content')
<div class="container m-auto" >
    <h3 class="card-title">Edit Room</h3>
    <form action="/editRoom" method="post">
        @method('patch')
        @csrf
        <div class="form-group ">
            <label for="Nama">Room Number</label>
            <input type="text" class="form-control" name="room_id" value="{{ $ruangan->first()->ruangan_id}}" style="width: 200px" disabled >
            <input type="text" class="form-control" name="room_id" value="{{ $ruangan->first()->ruangan_id}}" style="width: 200px" hidden >
        </div>
        <div class="form-group ">
            <label for="Nama" class="m-auto">Room Size</label>
            <select name="RoomSize">
                <option value="48">48</option>
                <option value="40">40</option>

            </select>
        </div>
        <button class="btn btn-primary" onclick="cekSeat()" type="submit">Confirm Edit</button>
    </form>
</div>
@endsection