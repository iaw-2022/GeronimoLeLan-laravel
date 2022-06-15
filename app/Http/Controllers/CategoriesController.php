<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoriesController extends Controller
{
    public function index(){
        return view('categories.index',  ['categories' => Category::all() ]);
    }
    public function create(){
        return view('categories.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:categories,name|max:255',
       ]);
       Category::create([
           'name' => $request->name,
           'description' => $request->description,
           'id_game' =>1
       ]);
       return redirect('/categories');
    }
    public function show($id){}
    public function edit($id)
    {
         $category = Category::find($id);
         return view('categories.edit')->with('category',$category);
    }
    public function update(Request $request,$id){
        $category = Category::find($id);
        $category->name= $request->name;
        $category->description= $request->description;    
        if ($category->description==null){
            $category->description='';
        }
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories,name,'.$id,
       ]);
        $category->save();
        return redirect('categories');
    }
    public function destroy($id){
        Category::destroy($id);
        return redirect('/categories');
    }
}
