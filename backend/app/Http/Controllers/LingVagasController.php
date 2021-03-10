<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Linguagens;
use App\LingVagas;
use Illuminate\Support\Facades\DB;

class LingVagasController extends Controller
{
    public function list(){


        
    }

    public function listById($id){


        $linguagens = DB::table('ling_vagas')
        ->join('linguagens', 'linguagens.id','=','ling_vagas.id_linguagem')
        ->where('id_vaga',$id)
        ->select('ling_vagas.id','ling_vagas.id_linguagem','linguagens.nome')
        ->get();

        //dd($linguagens, $vaga);
        return $linguagens;

    }

    public function deleteLing($id){


    if(!$delete = LingVagas::find($id))
        return 200;

    return $delete->delete();

    //return redirect()->route('vagas.list');

    }

    public function insertLing(Request $request){


        //dd($request);

        LingVagas::create($request->all());
        //return redirect()->route('vagas.list');

    }
}
