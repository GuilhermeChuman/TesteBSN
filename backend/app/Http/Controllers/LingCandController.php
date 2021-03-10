<?php

namespace App\Http\Controllers;

use App\LingCand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LingCandController extends Controller
{
    public function listById($id){


        $linguagens = DB::table('ling_cands')
        ->join('linguagens', 'linguagens.id','=','ling_cands.id_linguagem')
        ->where('id_cand',$id)
        ->select('ling_cands.id','ling_cands.id_linguagem','linguagens.nome')
        ->get();

        //dd($linguagens, $vaga);
        return $linguagens;

    }

    public function deleteLing($id){


    if(!$delete = LingCand::find($id))
        return 200;

    return $delete->delete();

    //return redirect()->route('vagas.list');

    }

    public function insertLing(Request $request){


        //dd($request);

        LingCand::create($request->all());
        //return redirect()->route('vagas.list');

    }
}
