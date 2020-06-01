@extends('layouts.app')

@section('title')
    Booking
@endsection

@if ( $umur < ($film->first()->film_age))
    @section('content')
        <div class="container text-center">
            <h2>Sorry Age Restriction :)</h2>
            <div class="mt-2">
                <a href="/">
                    <Button class="btn btn-danger" style="float: center"> Go Back </Button>
                </a>
            </div>
        </div>
    @endsection
@else
    @section('content')
        <div class="container">
            <div class="row card-md3">
                <div class="col-3 m-auto">
                    <div class="row">
                        <img src="{{ url('/img/'.$film->first()->id_image) }}" class="card-img img img-fluid img-shadow" alt="...">
                    </div>
                    <div class="row m-auto">
                        <h3 class="m-auto">{{ $film->first()->film_title }}</h3>
                    </div>
                    
                </div>
            
                <div class="seatStructure col-6 m-auto">
                    <center>
                        <table id="seatsBlock">
                            <td colspan="14"><div class="screen">SCREEN</div></td>
                            <p id="notification"></p>
                            <tr>
                                <td></td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                
                            </tr>
                            @if($ruangan->first()->ruangan_capacity == 40)
                                <tr>
                                    <td>A</td>
                                    @foreach($seat as $s)
                                        @if($s->seat_rows == 'A')
                                            @if($s->seat_avaibility == 'Y')
                                                <td><input type="checkbox" id="avaiable" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @else
                                                <td><input type="checkbox" id="dissabledBoxes" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                                
                                <tr>
                                    <td>B</td>
                                    @foreach($seat as $s)
                                        @if($s->seat_rows == 'B')
                                            @if($s->seat_avaibility == 'Y')
                                                <td><input type="checkbox" id="avaiable" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @else
                                                <td><input type="checkbox" id="dissabledBoxes" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                                
                                <tr>
                                    <td>C</td>
                                    @foreach($seat as $s)
                                        @if($s->seat_rows == 'C')
                                            @if($s->seat_avaibility == 'Y')
                                                <td><input type="checkbox" id="avaiable" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @else
                                                <td><input type="checkbox" id="dissabledBoxes" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                                    
                                <tr>
                                    <td>D</td>
                                    @foreach($seat as $s)
                                        @if($s->seat_rows == 'D')
                                            @if($s->seat_avaibility == 'Y')
                                                <td><input type="checkbox" id="avaiable" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @else
                                                <td><input type="checkbox" id="dissabledBoxes" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>E</td>
                                    @foreach($seat as $s)
                                        @if($s->seat_rows == 'E')
                                            @if($s->seat_avaibility == 'Y')
                                                <td><input type="checkbox" id="avaiable" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @else
                                                <td><input type="checkbox" id="dissabledBoxes" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                            @else
                                <tr>
                                    <td>A</td>
                                    @foreach($seat as $s)
                                        @if($s->seat_rows == 'A')
                                            @if($s->seat_avaibility == 'Y')
                                                <td><input type="checkbox" id="avaiable" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @else
                                                <td><input type="checkbox" id="dissabledBoxes" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                                
                                <tr>
                                    <td>B</td>
                                    @foreach($seat as $s)
                                        @if($s->seat_rows == 'B')
                                            @if($s->seat_avaibility == 'Y')
                                                <td><input type="checkbox" id="avaiable" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @else
                                                <td><input type="checkbox" id="dissabledBoxes" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                                
                                <tr>
                                    <td>C</td>
                                    @foreach($seat as $s)
                                        @if($s->seat_rows == 'C')
                                            @if($s->seat_avaibility == 'Y')
                                                <td><input type="checkbox" id="avaiable" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @else
                                                <td><input type="checkbox" id="dissabledBoxes" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                                    
                                <tr>
                                    <td>D</td>
                                    @foreach($seat as $s)
                                        @if($s->seat_rows == 'D')
                                            @if($s->seat_avaibility == 'Y')
                                                <td><input type="checkbox" id="avaiable" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @else
                                                <td><input type="checkbox" id="dissabledBoxes" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                                
                                <tr>
                                    <td>E</td>
                                    @foreach($seat as $s)
                                        @if($s->seat_rows == 'E')
                                            @if($s->seat_avaibility == 'Y')
                                                <td><input type="checkbox" id="avaiable" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @else
                                                <td><input type="checkbox" id="dissabledBoxes" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>F</td>
                                    @foreach($seat as $s)
                                        @if($s->seat_rows == 'F')
                                            @if($s->seat_avaibility == 'Y')
                                                <td><input type="checkbox" id="avaiable" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @else
                                                <td><input type="checkbox" id="dissabledBoxes" class="seats align-top" value="{{$s->seat_rows.$s->seat_columns}}"></td>
                                            @endif    
                                        @endif
                                    @endforeach
                                </tr>
                            @endif
                            
                            
                            
                        </table>
                            <div class="row box-description mt-3">
                                <div class="smallBox greenBox">  Selected Seat</div> <br/>
                                <div class="smallBox redBox">  Reserved Seat</div><br/>
                                <div class="smallBox emptyBox">  Empty Seat</div><br/>
                            </div>
                        <br/><button class="btn btn-secondary" onclick="updateTextArea()">Confirm Seat Selection</button>
                    </center>
                    
                </div> 

                <div class="col-3 m-auto">

                    <form action="{{ $ruangan->first()->ruangan_id }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group mt-2">
                            <label for="Nama">Name Customer</label>
                            <input type="text" class="form-control" name="nama" value="{{ Auth::user()->name }}" disabled >
                        </div>
                        <div class="form-group">
                            <label for="film">Film</label>
                            <input type="text" class="form-control" name="film" value="{{ $film->first()->film_title }}" disabled >
                        </div>
                        <div class="form-group">
                            <label for="ruangan">Room</label>
                            <input type="text" class="form-control" name="room1" value="{{ $ruangan->first()->ruangan_id }}" disabled >
                            <input type="text" class="form-control" name="room" value="{{ $ruangan->first()->ruangan_id }}" hidden >
                        </div>
                        <div class="form-group">
                            <label for="Seat">Seat</label>
                            <input type="text" class="form-control" name="seat1" id="seat1" value="" required disabled>
                            <input type="text" class="form-control" name="seat" id="seat" value="" required hidden>
                        </div>
                        <button class="btn btn-primary" onclick="cekSeat()" type="submit">Confirm Booking</button>
                    </form>
                    
                </div>
            </div>
        </div>
    @endsection
@endif




@section('extra-css')
    <link href="{{ asset('css/seat.css') }}" rel="stylesheet">
@endsection


@section('page-js-script')
<script type="text/javascript">
    $( document ).ready(function() {
        $("input#avaiable").prop("disabled", false);
        $('input#dissabledBoxes').prop('disabled', true);
        $(":checkbox").click(function() {
            if ($("input:checked").length == (1)) {
                $(":checkbox").prop('disabled', true);
                $(':checked').prop('disabled', false);
            }
            else
            {
                $("input#avaiable").prop("disabled", false);
            }
        });

    });


    //Ketika klik button start selectiong
    function takeData()
    {  
        $("input#avaiable").prop("disabled", false);
        document.getElementById("notification").innerHTML = "<b style='margin-bottom:0px;background:yellow;'>Please Select your Seats NOW!</b>";
        $('#dissabledBoxes *').prop('disabled', true);
    }


    function updateTextArea() { 
        if (($("input:checked").length == (1)) )
        {
            $(".seatStructure *").prop("disabled", true);
            
            var allNameVals = [];
            var allNumberVals = [];
            var allSeatsVals = [];
            
            //Storing in Array
            $('#seatsBlock :checked').each(function() {
                allSeatsVals.push($(this).val());
            });
            
            //Displaying 
            $('#nameDisplay').val(allNameVals);
            $('#NumberDisplay').val(allNumberVals);
            $('#seatsDisplay').val(allSeatsVals);
            $('#seat').val(allSeatsVals);
            $('#seat1').val(allSeatsVals);
        }
        else{
            alert("Please select seats")
        }
    }

    function cekSeat(){
        if($('#seat').val() == ""){
            alert("Please select seats");
        }
    }

    
</script>
@stop

