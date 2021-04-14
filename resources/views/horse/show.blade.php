@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Žirgo aprašymas</h2></div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item list-line">
                    
                            <div class="list-line__horse__better">
                                Žirgo vardas: 
                                <div class="list-line__horse__type">  
                            {{$horse->name}}
                            </div>
                        </div>
                    </li>
                        
                        <li class="list-group-item list-line">
                            <div class="list-line__horse__better">
                                Laimėtų rungtynių skaičius:
                                <div class="list-line__horse__type">  
                            {{$horse->runs}}
                            </div>
                        </div>
                    </li>
                                
                        
                        <li class="list-group-item list-line">
                            <div class="list-line__horse__better">
                                Dalyvauta rungtynių skaičius: 
                                <div class="list-line__horse__type"> 
                            {{$horse->wins}}
                             </div>
                            </div>
                        </li> 
                        
                        <li class="list-group-item list-line">
                            <div  class="list-line__horse__better">
                                Žirgo aprašymas: 
                                <div class="list-line__horse__type"> 
                            {{$horse->about}}
                             </div>
                            </div>
                        </li>
                    
    
                            <div class="list-line__buttons">
                                <a href="{{route('horse.edit',[$horse])}}" class="btn btn-info">EDIT</a>
                                {{-- <a href="{{route('author.edit',[$horse->horseAuthor])}}" class="btn btn-info">AUTHOR EDIT</a> --}}
                            </div>
                        
                     </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection