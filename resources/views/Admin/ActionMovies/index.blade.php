@extends('layouts.app')
@section('title')
<title>Action Movies</title>
@endsection
@section('content')
<p></p>
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
                <h1>Action Movies</h1>
                <a class="text-right" href="/admin/ActionMovies/create">Add new movie</a>
            </div>
        </div class = "col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Film</th>
                    <th scope="col">Genre</th>
                    <th scope="col">RottenTomatoes</th>
                    <th scope="col">Budget</th>
                    <th scope="col">Year</th>
                </tr>
            </thead>
            <tbody>
            @foreach($ActionMovies as $AcMovies)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $AcMovies["film"] }}</td>
                        <td>{{ $AcMovies["genre"] }}</td>
                        <td>{{ $AcMovies["grade"] }}</td>
                        <td>{{ $AcMovies["budget"] }}</td>
                        <td>{{ $AcMovies["year"] }}</td>
                        <td>
                            <a href="/admin/ActionMovies/{{$AcMovies['_id'] }}">Details</a> |
                            <a href="/admin/ActionMovies/edit/{{ $AcMovies->_id }}">Edit</a> |
                            <a href="/admin/ActionMovies/delete/{{ $AcMovies->_id }}">Delete</a> 
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection