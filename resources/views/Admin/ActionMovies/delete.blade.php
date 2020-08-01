@extends(' layouts.app')

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
                <h1>Delete a movie from the database.</h1>
                
                <form action="/admin/ActionMovies/delete" method="POST">
                @csrf
                @method("DELETE")
                <input type="hidden" name="movieid" id="movieid" value="{{ $ActionMovies->_id }}">
                    <div class="form-group">
                        <label for="film">Movie Name</label>
                        <input type="text" class="form-control" id="film" name="film" value="{{ $ActionMovies->film}}" disabled>
                    </div>
                    <div class="form-group">
                    <label for ="genre"> genre </label>
                    <textarea class= "form-control" name="genre" id="genre" cols="30" rows="3" value="{{ $ActionMovies->genre }}" disabled></textarea>
                    </div>
                    <div class="form-group">
                    <label for ="grade"> Rotten Tomatoes </label>
                    <textarea class= "form-control" name="grade" id="grade" cols="30" rows="3" value="{{ $ActionMovies->grade }}" disabled></textarea>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="budget">budget</label>
                        <input type="text" class="form-control" id="budget" name="budget" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="year">year</label>
                        <select type="text" class="form-control" id="year" name="year" value="{{ $ActionMovies->year }} disabled">
                            <option value ="0">Select the year...</option>
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
                    <button class="btn btn-default" type="submit">Cancel</button>
                    <!-- <button class="btn btn-danger" type="submit">Delete</button> -->

                    <!-- Button trigger modal -->
                         <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#MdlDeleteConfirmation">
                           Delete
                         </button>

                     <!-- Modal -->
                     <div class="modal fade" id="MdlDeleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="MdlDeleteConfirmationLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header bg-danger dark">
                             <h5 class="modal-title" id="MdlDeleteConfirmationLabel">Delete movie</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                             Are you sure that you want to delete this? This action can be undone.
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                             <button type="submit" class="btn btn-danger">Confirm</button>
                           </div>
                         </div>
                       </div>
                     </div>
                </form>
            </div>
        </div>
    </div>     
@endsection
