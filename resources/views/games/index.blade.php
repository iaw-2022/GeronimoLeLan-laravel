<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Games') }}
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
                          
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($games as $game)
                <tr>
                  <th scope="row"> {{$game->name}}</th>
                  <td>{{$game->description}}</td>
                  <td>
                  <form action="{{ route('games.destroy',$game->id) }}" method="POST">
          <a href="/games/{{$game->id}}/edit" class="btn btn-info">Edit</a>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
         </form>
                </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <form action='/games' method="POST">
  @csrf
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">                 
          <div class="form-group row">
            <div>
              <h1 for="game name" class="col-sm-2 col-form-label">Create a new game</h1>
            </div>
            <div class="col-sm-10">
              <input name="name" class="form-control" placeholder="game name">
              <input name="description" class="form-control" placeholder="game description">
            </div>
          </div>
          @if($errors->has('name'))
            <div class="error">{{ $errors->first('name') }}</div>
          @endif
          <button type="submit" class="btn btn-primary">Create game</button>
        </div>
      </div>
    </div>                
  </form>               
</x-app-layout> 