<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Categories') }}
    </h2>
  </x-slot>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function ConfirmDelete(){
      var respuesta = confirm("Are you sure you want to delete this category?\nGames that have only this category will also be deleted");
      return respuesta;
    }
    </script>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <a href="/categories/create" class="btn btn-primary">Create a new category</a>
      <div class="py-3">
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
                  <td>
                    <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                      <a href="/categories/{{$category->id}}/edit" class="btn btn-info">Edit</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return ConfirmDelete()">Delete</button>
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