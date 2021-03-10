<?php

namespace App\Http\Controllers;

use App\Candidatos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatosController extends Controller
{
    
    public function getAll(){

        return Candidatos::all();
    }
    
    public function list(){

        $candidatos = DB::table('ling_cands')
        ->join('candidatos','candidatos.id','=','ling_cands.id_cand', 'right')
        ->join('linguagens','linguagens.id','=','ling_cands.id_linguagem', 'left')
        ->select('candidatos.id','candidatos.nome','candidatos.cpf','candidatos.email','candidatos.telefone','candidatos.endereco')->selectRaw('GROUP_CONCAT(linguagens.nome) as Linguagens')
        ->groupBy('candidatos.id','candidatos.nome')
        ->orderBy('candidatos.nome','ASC')
        ->get();

        return compact('candidatos');

    }

    public function insert(Request $request){
        
        Candidatos::create($request->all());

        return redirect()->route('candidatos.list');

    }


    public function delete($id){

        if(!($cadidato = Candidatos::find($id)))
               return 404;
              // redirect()->route('candidatos.list');

        $cadidato->delete();
        return 200;
        //return redirect()->route('candidatos.list');

    }

    public function getById($id){

        if(!($candidato = Candidatos::find($id)))
               return 404;

        //dd(compact('candidato'));
        return $candidato;

    }

    public function update(Request $request, $id){

        if(!$candidatos = Candidatos::find($id))
            return redirect()->route('candidatos.list');

        $candidatos->update($request->all());
            
        return redirect()->route('candidatos.list');

    }
}
