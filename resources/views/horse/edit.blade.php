

 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                 <h2>Žirgo redagavimas</h2>
                </div>

               <div class="card-body">
                <form method="POST" action="{{route('horse.update',[$horse->id])}}">
                    <div class="form-group">
                        <label class="list-line__horse__better">Vardas</label>
                        <input type="text" name="horse_name"  class="form-control" value="{{old('horse_name',$horse->name)}}">
                        <small class="form-text text-muted">Žirgo vardas.</small>
                    </div>
                    <div class="form-group">
                        <label class="list-line__horse__better">Laimėtų rungtynių skaičius</label>
                        <input type="text" name="horse_wins"  class="form-control" value="{{old('horse_wins',$horse->wins)}}">
                        <small class="form-text text-muted">Žirgo laimėtų rungtynių skaičius.</small>
                    </div>
                    <div class="form-group">
                        <label class="list-line__horse__better">Dalyvauta rungtynių skaičius</label>
                        <input type="text" name="horse_runs"  class="form-control" value="{{old('horse_runs',$horse->runs)}}">
                        <small class="form-text text-muted">Dalyvauta rungtynių skaičius.</small>
                    </div>
                    <div class="form-group">
                        <label  class="list-line__horse__better">Aprašymas </label>
                        <textarea name="horse_about" id="summernote">{{$horse->about}}</textarea>
                        <small class="form-text text-muted">Žirgo aprašymas</small>
                      </div>
                    
                    @csrf
                    <button type="submit" class="btn btn-info">Patvirtinti</button>
                 </form>
                
               </div>
           </div>
       </div>
   </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        $('#summernote').summernote();
    });
</script>
@endsection

