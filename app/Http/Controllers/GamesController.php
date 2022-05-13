<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game; 

class GamesController extends Controller
{
    public function index(){
        return view('games.index');
    }
    public function create(){
       // return view('games.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
             'name' => 'required|unique:games,name|max:255',
        ]);
        $games = Game::create([
            'name' => $request->name,
            'description' => '',
        ]);
        return redirect('/games');
    }
    public function show($id){}
    public function edit($id){}
    public function update($id){}
    public function destroy($id){}

}
