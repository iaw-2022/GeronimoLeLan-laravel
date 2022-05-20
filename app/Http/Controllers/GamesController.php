<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Game;


class GamesController extends Controller
{
    public function index(){
        return view('games.index',  ['games' => Game::all() ]);
    }
    public function create(){}
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:games,name|max:255',
       ]);
       Game::create([
           'name' => $request->name,
           'description' => $request->description
       ]);
       return redirect('/games');
    }
    public function show($id){}
    public function edit($id)
    {
         $game = Game::find($id);
         return view('games.edit')->with('game',$game);
    }
    public function update(Request $request,$id){
        $game = Game::find($id);
        $game->name= $request->name;
        $game->description= $request->description;    
        if ($game->description==null){
            $game->description='';
        }
        $validated = $request->validate([
            'name' => 'required|unique:games,name|max:255',
       ]);
        $game->save();
        return redirect('games');
    }
    public function destroy($id){
        Game::destroy($id);
        return redirect('/games');
    }
}
