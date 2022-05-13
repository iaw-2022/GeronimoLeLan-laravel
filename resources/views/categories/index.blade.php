<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Categories') }}
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
                          
                <th scope="col">Games</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                <tr>
                  <th scope="row"> {{$category->name}}</th>
                  <td>{{$category->description}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <form action='/categories' method="POST">
  @csrf
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">                 
          <div class="form-group row">
            <div>
              <label for="Category name" class="col-sm-2 col-form-label">Create a new category</label>
            </div>
            <div class="col-sm-10">
              <input name="name" class="form-control" placeholder="Category name">
              <input name="description" class="form-control" placeholder="Category description">
            </div>
          </div>
          @if($errors->has('name'))
            <div class="error">{{ $errors->first('name') }}</div>
          @endif
          <button type="submit" class="btn btn-primary">Create Category</button>
        </div>
      </div>
    </div>                
  </form>               
</x-app-layout> 