
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
                        <th scope="col">Categories</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Dark Souls%</th>
                        <td>Es un souls like </td>
                        <td>All</td>
                      </tr>
                      <tr>
                        <th scope="row">100%</th>
                        <td>finalizar el juego con un % de completitud >= a 100</td>
                        <td>DS</td>
                      </tr>
                      <tr>
                        <th scope="row">All achievements</th>
                        <td>Conseguir todos los logros del juego</td>
                        <td>    
                            <form action='/games' method="POST">
                                @csrf
                                <input name='name' value=123>
                                @if($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                                <button type="submit" class="btn btn-primary">Create game</button>
                            </form>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 
    