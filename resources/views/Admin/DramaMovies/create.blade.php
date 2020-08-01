@extends(' layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add new movies to the database</h1>
                <form action="/admin/DramaMovies/create" method="POST">
                @csrf
                    
                    <div class="form-group">
                        <label for="film">film</label>
                        <input type="text" class="form-control" id="film" name="film">
                    </div>
                    <div class="form-group">
                    <label for ="genre"> genre </label>
                    <textarea class= "form-control" name="genre" id="genre" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                    <label for ="grade"> Rotten Tomatoes </label>
                    <textarea class= "form-control" name="grade" id="grade" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="budget">budget</label>
                        <input type="text" class="form-control" id="budget" name="budget">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="year">year</label>
                        <select type="text" class="form-control" id="year" name="year">
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
                    <button class="btn btn-success" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>     
@endsection
