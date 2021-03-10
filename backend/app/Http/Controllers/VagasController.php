<?php

namespace App\Http\Controllers;

use App\Vagas;
use App\Linguagens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VagasController extends Controller
{
    public function index(){


        $selection = DB::table('ling_vagas')
        ->join('vagas','vagas.id','=','ling_vagas.id_vaga', 'right')
        ->join('linguagens','linguagens.id','=','ling_vagas.id_linguagem', 'left')
        ->select('vagas.id','vagas.funcao')->selectRaw('GROUP_CONCAT(linguagens.nome) as Linguagens')
        ->groupBy('vagas.id','vagas.funcao')
        ->orderBy('vagas.Funcao','ASC')
        ->get();

        
        return $selection;

    }

    public function getById($id){

        return Vagas::findOrFail($id);

    }

    public function destroy($id){

        if(!$vagas = Vagas::find($id))
        {
            return null;
        }
        
        $vagas->delete();

        //return redirect()->route('vagas.list');

    }

    public function alter($id){

        if(!$vagas = Vagas::find($id))
            return redirect()->route('vagas.list');

        return view('Vagas.vagasFormAlter',compact('vagas'));

    }

    public function update(Request $request, $id){

        if(!$vagas = Vagas::find($id))
            return null;

        $vagas->update($request->all());
            
        //return redirect()->route('vagas.list');
    }

    public function form()
    {

        $linguagens = Linguagens::get();

        return view('Vagas.vagasForm', compact('linguagens'));
    }

    public function insertSolo(Request $request)
    {
        Vagas::create($request->all());
        //return redirect()->route('vagas.list');
    }
}
