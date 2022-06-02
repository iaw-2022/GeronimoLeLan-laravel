<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Creating a Category') }}
    </h2>
  </x-slot>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <form action='/categories' method="POST">
    @csrf
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
              <div class="form-group row">
                <div class="mb-3">
                  <label for="" class="form-label">Name</label>
                  <input name="name" class="form-control" placeholder="category name">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Description</label>
                  <input name="description" class="form-control" placeholder="category description">
                </div>
              </div>
              @if($errors->has('name'))
              <div class="error">{{ $errors->first('name') }}</div>
              @endif
            </div>
          </div>
          <div class="py-3 ">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <a href="/categories" class="btn btn-danger">Cancel</a>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>