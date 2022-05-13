<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoriesController extends Controller
{
    public function index(){
        return view('categories.index',  ['categories' => Category::all() ]);//['categories' => 'Category']);
        //('greeting', ['name' => 'James']);
    }
    public function create(){}
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:categories,name|max:255',
       ]);
       $games = Category::create([
           'name' => $request->name,
           'description' => $request->description
       ]);
       return redirect('/categories');
    }
    public function show($id){}
    public function edit($id){}
    public function update($id){}
    public function destroy($id){}
}
