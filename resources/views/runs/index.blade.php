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
                          
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($runs as $run)
                <tr>
                  <th scope="row"> {{$run->name}}</th>
                  <td>{{$run->description}}</td>
                  @php
                    $validation = "No";
                  if ($run->validation==true)
                  $validation = "Yes";
                  @endphp
                  <td>{{$validation}}</td>
                  
                
                  <td>{{$run->positive_votes}}</td>
                  <td>{{$run->negative_votes}}</td>
                  <td>
                  <form action="{{ route('runs.destroy',$run->id) }}" method="POST">
          <a href="/runs/{{$run->id}}/edit" class="btn btn-info">Edit</a>         
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
</x-app-layout> 