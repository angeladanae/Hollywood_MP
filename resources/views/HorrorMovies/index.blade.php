@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Drama Movies Index</h1>
                <div class="row">
                    @foreach($HorrorMovies as $HoMovies)
                  <div class="card col-md-3">
                         
                             <div class="card-body">
                            <h5 class="card-title">{{ $HoMovies->film }}</h5>
                            <p class="card-text">{{ $HoMovies->genre }}</p>
                            <p class="card-text">{{ $HoMovies->year }}</p>
                            <a href="/HorrorMovies/{{ $HoMovies->_id }}" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                    @endforeach
                    
                    <div class="col-md-12">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                         <div class="btn-group mx-auto" role="group" aria-label="First group">
                            @php
                                 $cpage = request('pg') == 0 ? 1 : request('pg');
                            @endphp
                            <a href="/HorrorMovies?pg= {{$cpage - 1}}" class="btn btn-secondary {{ $cpage == 1 ? 'disabled' : ' ' }}">&lt</a>

                           @for ($i = 1; $i <= ceil($moviesFOURcount/12); $i++)
                           <a href="/HorrorMovies?pg={{$i}}"  class="btn btn-secondary {{( $cpage == $i ? 'disabled' : ' ') }} ">{{ $i }}</a>
                           @endfor
                           <a href="/HorrorMovies?pg= {{$cpage + 1}}" class="btn btn-secondary {{ $cpage == ceil($moviesFOURcount/12) ? 'disabled' : ' ' }}">&gt</a>
                         </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection