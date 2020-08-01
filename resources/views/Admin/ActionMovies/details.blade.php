@extends('layouts.app')

@section('content')
    <div class="container">
    @if (session('mssg') !== null)
    <div class="alert alert-{{session('alerttype')}} alert-dismissible fade show" role="alert">
                {{ session('mssg') }}
                    <strong> </strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
    @endif
        <div class="row">
            <div class="col-md-12">
                <h1>Movie details</h1>               
                  <div class="card">
                  <input type="hidden" name="movieid" id="movieid">
                    <div class="card-body">
                      <h5 class="card-title">{{ $ActionMovies->film }}</h5>
                      <p class="card-text">
                      <b>Genre:</b>   {{ $ActionMovies->genre }}
                      <br>
                      <b>Rotten Tomatoes:</b>   {{ $ActionMovies->grade }}
                      <br>
                      <b>Budget:</b>   {{ $ActionMovies->budget }}
                      <br>
                      <b>Year:</b>    {{$ActionMovies->year }}
                       </p>
                      <a href="/admin/ActionMovies/edit/{{ $ActionMovies->_id }}" class="btn btn-primary">Edit</a>
                      <a href="/admin/ActionMovies/delete/{{ $ActionMovies->_id }}" class="btn btn-primary">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
