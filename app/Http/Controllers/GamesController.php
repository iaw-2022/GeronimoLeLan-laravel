<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Category;

class GamesController extends Controller
{
    public function index(){
        return view('games.index',  ['games' => Game::all() ]);
    }
    public function create(){
        return view('games.create',['categories'=>Category::all()]);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:games,name|max:255',
            'categories' => 'required'
       ]);
       $newGame=Game::create([
           'name' => $request->name,
           'description' => $request->description
       ]);
       
       //$categories=[];
       foreach($request->categories as $category){
        $newGame->categories()->attach($category);
       }
       foreach(Category::all() as $category){
            if($request->has($category->id)){
                $newGame->categories()->attach($request->categories);
            }}
       return redirect('/games');
    
    }
    
    public function show($id){}
    public function edit($id)
    {
         $game = Game::find($id);
         return view('games.edit',['categories'=>Category::all(),'game'=>$game]);
    }
    public function update(Request $request,$id){
        $game = Game::find($id);
        $game->name= $request->name;
        $game->description= $request->description;    
        if ($game->description==null){
            $game->description='';
        }
        $validated = $request->validate([
            'name' => 'required|max:255|unique:games,name,'.$id,
       ]);


       foreach(Category::all() as $category ){
           $a="";
           if (in_array($category->id,$request->categories)){
               if(!$game->categories->contains($category))
                    $game->categories()->attach($category->id);
           }else{
            $game->categories()->detach($category->id);
           }
        }    
       $game->save();
       return redirect('games');
    }
    public function destroy($id){
        Game::destroy($id);
        return redirect('/games');
    }
}
