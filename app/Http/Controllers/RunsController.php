<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Run;

class RunsController extends Controller
{
    public function index(){
        return view('runs.index',['runs' => Run::all()]);
    }
    public function create(){}
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:runs,name|max:255',
       ]);
       $newRun=Run::create([
           'name' => $request->name,
           'description' => $request->description,
           'validation' => false,
           'positive_votes' => 32,
           'negative_votes' => 4,
           'id_game' => $request->id_game,
           'id_user' => $request->id_user

       ]);
       $newRun->categories()->attach(1);
       return redirect('/runs');
    }
    public function show($id){}
    public function edit($id){}
    public function update($id)
    {
    }
    public function destroy($id){
        Run::destroy($id);
        return redirect('/runs');
    }
    public function validation(Request $request)
    {        
        $run = Run::find($request->id);
        $run->validation = true;
        $run->save();
        return redirect('/runs'); 
    }
}
