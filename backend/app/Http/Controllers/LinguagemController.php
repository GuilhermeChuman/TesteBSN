<?php

namespace App\Http\Controllers;

use App\Linguagens;
use Illuminate\Http\Request;

class LinguagemController extends Controller
{
    public function index(){

        return Linguagens::all();

    }

    public function store(Request $request){
        //dd($request);
        Linguagens::create($request->all());

    }

    public function show($id){
        
        return Linguagens::findOrFail($id);
        
    }

    public function update(Request $request, $id){

        $linguagem = Linguagens::findOrFail($id);
        $linguagem->update($request->all());
        
    }

    public function destroy($id){

        $linguagem = Linguagens::findOrFail($id);
        $linguagem->delete();
        
    }
}
