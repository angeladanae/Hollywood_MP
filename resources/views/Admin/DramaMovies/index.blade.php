@extends('layouts.app')
@section('title')
<title>Comedy Movies</title>
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
                <h1>Drama Movies</h1>
                <a class="text-right" href="/admin/DramaMovies/create">Add new movie</a>
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
            @foreach($DramaMovies as $DrMovies)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $DrMovies["film"] }}</td>
                        <td>{{ $DrMovies["genre"] }}</td>
                        <td>{{ $DrMovies["grade"] }}</td>
                        <td>{{ $DrMovies["budget"] }}</td>
                        <td>{{ $DrMovies["year"] }}</td>
                        <td>
                            <a href="/admin/DramaMovies/{{$DrMovies['_id'] }}">Details</a> |
                            <a href="/admin/DramaMovies/edit/{{ $DrMovies->_id }}">Edit</a> |
                            <a href="/admin/DramaMovies/delete/{{ $DrMovies->_id }}">Delete</a> 
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection