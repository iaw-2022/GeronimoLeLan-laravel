<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Runs') }}
    </h2>
  </x-slot>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <div class="py-12"> 
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  
        <div class="p-6 bg-white border-b border-gray-200">
                  
          <table class="table">
                      
            <thead class="thead-dark">
                        
              <tr> 
                <th scope="col">Name</th>
                          
                <th scope="col">Description</th>
                          
                <th scope="col">Validation</th>
                <th scope="col">Positive votes</th>
                          
                <th scope="col">Negative votes</th>
                          
                <th scope="col">Game</th>
                
                <th scope="col">User</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($runs as $run)
                <tr>
                  <th scope="row"> {{$run->name}}</th>
                  <td>{{$run->description}}</td>
                  @php
                    $p_votes=$run->positive_votes;
                    $n_votes=$run->negative_votes;
                    $validation = "No";
                  if ($run->validation==true){
                    $validation = "Yes";
                    $p_votes='-';
                    $n_votes='-';
                  }
                  @endphp
                  <td>{{$validation}}</td>
                  <td>{{$p_votes}}</td>
                  <td>{{$n_votes}}</td>
                  <td>{{$run->games->name}}</td>
                  <td>{{$run->user->name}}</td>
                  <td>
                    
                  <form action="{{ route('runs.destroy',$run->id) }}" method="POST">
                  
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
         </form>
          <form method="POST" action="/runs/validation">
    @csrf
    <button class="btn btn-success" name="id" value="{{$run->id}}">Validate</button>  
</form>
                </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- ELIMINAR  -->
    <form action='/runs' method="POST">
  @csrf
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">                 
          <div class="form-group row">
            <div>
              <h1 for="game name" class="col-sm-2 col-form-label">ESTO ES PARA TEST</h1>
            </div>
            <div class="col-sm-10">
              <input name="name" class="form-control" placeholder="run name">

              <input name="description" class="form-control" placeholder="run description">
              
              <input name="id_game" class="form-control" placeholder="id_game">
              <input name="id_user" class="form-control" placeholder="id_user">
            </div>
          </div>
          @if($errors->has('name'))
            <div class="error">{{ $errors->first('name') }}</div>
          @endif
          <button type="submit" class="btn btn-primary">Create Run</button>
        </div>
      </div>
    </div>                
  </form>            
  <!-- ELIMINAR    -->
  </div>              
</x-app-layout> 