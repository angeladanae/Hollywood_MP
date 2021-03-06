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
                <h1>Edit the movie info.</h1>
                <form action="/admin/ComedyMovies/edit" method="POST">
                @csrf
                <input type="hidden" name="movieid" id="movieid" value="{{ $ComedyMovies->_id }}">
                    <div class="form-group">
                        <label for="film">film title</label>
                        <input type="text" class="form-control" id="film" name="film" value="{{ $ComedyMovies->film }}">
                    </div>
                    <div class="form-group">
                    <label for ="genre"> genre </label>
                    <textarea class= "form-control" name="genre" id="genre" cols="30" rows="3" value="{{ $ComedyMovies->genre }}"></textarea>
                    </div>
                    <div class="form-group">
                    <label for ="budget"> budget </label>
                    <textarea class= "form-control" name="budget" id="budget" cols="30" rows="3" value="{{ $ComedyMovies->budget }}"></textarea>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="grade">Rotten Tomatoes %</label>
                        <input type="text" class="form-control" id="grade" name="grade">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="year">year</label>
                        <select type="text" class="form-control" id="year" name="year" value="{{ $ComedyMovies->year}}">
                            <option value ="0">Select the year...</option>
                            <option value ="2000">2000</option>
                            <option value ="2001">2001</option>
                            <option value ="2002">2002</option>
                            <option value ="2003">2003</option>
                            <option value ="2004">2004</option>
                            <option value ="2005">2005</option>
                            <option value ="2006">2006</option>
                            <option value ="2007">2007</option>
                            <option value ="2008">2008</option>
                            <option value ="2009">2009</option>
                            <option value ="2010">2010</option>
                            <option value ="2011">2011</option>
                            <option value ="2012">2012</option>
                            <option value ="2013">2013</option>
                            <option value ="2014">2014</option>
                            <option value ="2015">2015</option>
                            <option value ="2016">2016</option>
                            <option value ="2017">2017</option>
                            <option value ="2018">2018</option>
                        </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>     
@endsection
