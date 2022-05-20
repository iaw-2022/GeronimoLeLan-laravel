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
    public function store($request){}
    public function show($id){}
    public function edit($id){}
    public function update($id){}
    public function destroy($id){}
}
