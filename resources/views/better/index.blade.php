

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h2>Lažybininkų sąrašas</h2>
                   <div class="make-inline">
                    <form action="{{route('better.index')}}" method="get" class="make-inline">
                        <div class="form-group make-inline">
                            <label>Horse: </label>
                            <select class="form-control" name="horse_id">
                                <option value="0" disabled @if($filterBy==0) selected @endif>Select horse</option>
                                @foreach ($horses as $horse)
                                <option value="{{$horse->id}}" @if($filterBy==$horse->id) selected @endif>
                                    {{$horse->name}} 
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info ">Filter</button>
                    </form>
                    <a href="{{route('better.index')}}" class="btn btn-info">Clear filter</a>
                   {{-- <a href="{{route('better.index', ['sort' => 'bet'])}}" class="sort" > Rušiuoti pagal statymą</a>
                   <a href="{{route('better.index')}}" class="sort"> Default </a> --}}
                </div>

               <div class="card-body">
                <ul class="list-group">
                @foreach ($betters as $better)
                <li class="list-group-item list-line">
                    <div class="list-line__horse__better">
                        {{$better->name}} {{$better->surname}} 
                        <div class="list-line__horse__type"> 
                        Pastate: {{$better->bet}} eur
                        </div>
                        <div class="list-line__horse__type"> 
                         {{$better->betterHorse->name}}
                        </div>
                    </div>
                    <div class="list-line__buttons">
                        <a href="{{route('better.edit',[$better])}}" class="btn btn-info">Redaguoti </a>
                        <form method="POST" action="{{route('better.destroy', [$better])}}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Ištrinti</button>
                        </form>
                    </div>
                </li>
              @endforeach
            </ul>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
