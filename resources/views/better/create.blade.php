
 
 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h2>Naujas lažybininkas</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('better.store')}}">
                        <div class="form-group">
                            <label class="list-line__horse__better">Vardas</label>
                            <input type="text" name="better_name"  class="form-control" value="{{old('better_name')}}">
                            <small class="form-text text-muted">Lažybininko vardas.</small>
                        </div>
                        <div class="form-group">
                            <label class="list-line__horse__better">Pavardė</label>
                            <input type="text" name="better_surname"  class="form-control" value="{{old('better_surname')}}">
                            <small class="form-text text-muted">Lažybininko pavardė.</small>
                        </div>
                        <div class="form-group">
                            <label class="list-line__horse__better">Statoma suma eurais</label>
                            <input type="text" name="better_bet"  class="form-control" value="{{old('better_bet')}}">
                            <small class="form-text text-muted">Lažybininko statoma suma eurais.</small>
                        </div>
                        <select name="horse_id">
                            @foreach ($horses as $horse)
                                <option value="{{$horse->id}}" >
                                    
                                    {{$horse->name}} </option>
                            @endforeach
                    </select>
                    
                        @csrf
                        <div class="list-line__buttons">
                            <button type="submit" class="btn btn-info">Pridėti</button>
                        </div>
                    </form>
            
                </div>
                 
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
