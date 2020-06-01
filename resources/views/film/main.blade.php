@extends('layouts.app')

@section('title')
    Home
@endsection

@guest
    @section('content')
    <div class="container">

        <div class="container clearfix mb-5">
            <div class="row ">
                <div class="col-md-4"> <h2> <mark> Now Showing </mark> </h2></div>
                
            </div>
        </div>

        <div class="row movies border border-lg rounded">
            @foreach ($movie->take(4) as $item)
                
                <div class="col-3">
                    <div class="text-center">
                        <h3>Room {{ $item->ruangan_id }}</h3>
                    </div>
                    <a href="/ShowMovies/{{ $item->film_id }}">
                        <div class="text-center">
                        <img class="img img-fluid" src="{{ url('/img/'.$item->id_image) }}" alt="{{$item->film_title}}">
                        </div>
                        <div class="text-center" >
                            <h4 class="movieDesc">{{$item->film_title}}</h4>
                        </div>
                    </a>
                </div>
                
            @endforeach
            
        </div>

        <div class="row justify-content-center mt-2">
            <a href="/LoadMore">
                <Button class="btn btn-primary" style="float: right"> Load More </Button>
            </a>
        </div>
    </div>
    @endsection
@else

    @if(Auth::user()->role == 2)
        @section('content')
        
        <div class="container">
            <div class="container clearfix mb-5">
                <div class="row ">
                    <div class="col-md-4"> <h2> <mark> Now Showing </mark> </h2></div>
                    
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <div class="row movies border border-lg rounded">
                @foreach ($movie->take(4) as $item)
                    
                    <div class="col-3">
                        <div class="text-center">
                            <h3>Room {{ $item->ruangan_id }}</h3>
                        </div>
                        <a href="/ShowMovies/{{ $item->film_id }}">
                            <div class="text-center">
                            <img class="img img-fluid" src="{{ url('/img/'.$item->id_image) }}" alt="{{$item->film_title}}">
                            </div>
                            <div class="text-center" >
                                <h4 class="movieDesc">{{$item->film_title}}</h4>
                            </div>
                        </a>
                    </div>
                    
                @endforeach
                
            </div>

            <div class="row justify-content-center mt-2">
                <a href="/LoadMore">
                    <Button class="btn btn-primary" style="float: right"> Load More </Button>
                </a>
            </div>
        </div>
        @endsection
        
    @else

        @section('scriptchartCDN')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8">
            </script>
        @endsection

        @section('scriptChart')
        {!! $usersChart->script() !!}
        @endsection

        @section('content')
            <div class="container">
                <h1>Sales Graphs</h1>
                <div style="width: 100% " >
                    {!! $usersChart->container() !!}
                </div>  
            </div>
        @endsection
    @endif
@endguest


