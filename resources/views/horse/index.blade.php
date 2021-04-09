


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h2>Žirgų sąrašas</h2>
                   <a href="{{route('horse.index', ['sort' => 'name'])}}" class="sort" > Rušiuoti pagal vardą</a>
                   <a href="{{route('horse.index')}}" class="sort"> Default </a>
                </div>

                <div class="card-body">
                    <ul class="list-group">

                    @foreach ($horses as $horse)
                        <li class="list-group-item list-line">
                            <div class="list-line__horse__better">
                                {{$horse->name}} 
                                
                            </div>
                            <div class="list-line__buttons">
                                <a href="{{route('horse.edit',[$horse])}}" class="btn btn-info">Redaguoti</a>
                                <form method="POST" action="{{route('horse.destroy', [$horse])}}">
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
