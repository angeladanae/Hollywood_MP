@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Drama Movies Index</h1>
                <div class="row">
                    @foreach($DramaMovies as $DrMovies)
                  <div class="card col-md-3">
                         
                             <div class="card-body">
                            <h5 class="card-title">{{ $DrMovies->film }}</h5>
                            <p class="card-text">{{ $DrMovies->genre }}</p>
                            <p class="card-text">{{ $DrMovies->year }}</p>
                            <a href="/DramaMovies/{{ $DrMovies->_id }}" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                    @endforeach
                    
                    <div class="col-md-12">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                         <div class="btn-group mx-auto" role="group" aria-label="First group">
                            @php
                                 $cpage = request('pg') == 0 ? 1 : request('pg');
                            @endphp
                            <a href="/DramaMovies?pg= {{$cpage - 1}}" class="btn btn-secondary {{ $cpage == 1 ? 'disabled' : ' ' }}">&lt</a>

                           @for ($i = 1; $i <= ceil($moviesTHREEcount/12); $i++)
                           <a href="/DramaMovies?pg={{$i}}"  class="btn btn-secondary {{( $cpage == $i ? 'disabled' : ' ') }} ">{{ $i }}</a>
                           @endfor
                           <a href="/DramaMovies?pg= {{$cpage + 1}}" class="btn btn-secondary {{ $cpage == ceil($moviesTHREEcount/12) ? 'disabled' : ' ' }}">&gt</a>
                         </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection