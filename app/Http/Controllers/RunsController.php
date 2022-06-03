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
    public function store(Request $request){}
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
