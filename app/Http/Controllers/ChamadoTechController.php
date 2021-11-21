<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Chamado;
use Illuminate\Support\Facades\DB;

class ChamadoTechController extends Controller
{
    public function index(){
        $total_chamados = DB::table('chamados')
        ->where('status', '=', 'Andamento')
        ->count();

        $chamados = DB::table('chamados')
        ->join('users','chamados.user_id','users.id')
        ->where('chamados.status', '=', 'Andamento')
        ->select('chamados.*','users.name')
        ->get();

        return view('list-chamados-tech', ['chamados' => $chamados, 'total' => $total_chamados]);
    }

    public function show(){
        $total_chamados = DB::table('chamados')
        ->where('status', '=', 'Andamento')
        ->count();

        $chamados = DB::table('chamados')
        ->join('users','chamados.user_id','users.id')
        ->where('chamados.status', '=', 'Confirmado')
        ->select('chamados.*','users.name')
        ->get();

        return view('list-chamados-tech-aceitos', ['chamados' => $chamados, 'total' => $total_chamados]);
    }

    public function update(Request $request){
        $chamado = Chamado::findOrFail($request->id);
        $chamado->titulo = $request->titulo;
        $chamado->equipamento = $request->equipamento;
        $chamado->problema = $request->problema;
        $chamado->observacao = $request->observacao;
        $chamado->status = $request->status;
        $chamado->save();

        return back();
    }

    public function finalizarChamado(Request $request){
        $chamado = Chamado::findOrFail($request->id);
        $chamado->status = "Finalizado";
        $chamado->update();

        return back();
    }

    public function listarFinalizados(){
        $total_chamados = DB::table('chamados')
        ->where('status', '=', 'Andamento')
        ->count();

        $chamados = DB::table('chamados')
        ->join('users','chamados.user_id','users.id')
        ->where('chamados.status', '=', 'Finalizado')
        ->select('chamados.*','users.name')
        ->get();

        return view('list-chamados-tech-finalizados', ['chamados' => $chamados, 'total' => $total_chamados]);
    }

}
