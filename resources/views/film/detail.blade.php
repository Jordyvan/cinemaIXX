@extends('layouts.app')
@section('title')
    Details
@endsection
@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="row no-gutters">
          <div class="col-md-4 text-center">
            <img src="{{ url('/img/'.$film->id_image) }}" class="card-img img img-fluid img-shadow" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div class="row">
                <div class="col-md-10">
                  <h4 class="card-title">{{ $film->film_title}}</h4>
                </div>
                <div class="col-md-2">
                  @if (Route::has('login'))
                    @auth
                      <a href="/Book/{{ $film->film_id}}">
                        <Button class="btn btn-primary" style="float: right"> Book </Button>
                      </a>
                    @else
                      <a href="{{ route('login') }}">
                        <Button class="btn btn-primary" style="float: right"> Book </Button>
                      </a>
                    @endauth               
                  @endif
                </div>
                
              </div>
                <div class="row">
                  <div class="col-md-3"><time>Age Restriction</time></div>
                  <div class="col-md-9">
                      <h5>
                        @if($film->film_age == 0)
                            All Age
                        @else
                            @if ($film->film_age == 13)
                                13+
                            @else
                                21+
                            @endif
                        @endif
                      </h5>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3"><time>Duration</time></div>
                  <div class="col-md-9">
                      <h5>{{$film->film_duration_minute}} Minutes</h5>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-3"><time>Synopsis</time></div>
                  <div class="col-md-9">
                      <h5>{{$film->film_description}}</h5>
                  </div>
                </div>
                <iframe src="{{ $film->trailer_link}}" class="embed-responsive"></iframe>
            </div>
            <div class="card-body card-bottom m-auto">
  
              
            </div>             
          </div>
        </div>
      </div>
</div>
@endsection

