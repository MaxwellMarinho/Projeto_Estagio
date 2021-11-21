<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Chamado;
use Illuminate\Support\Facades\DB;

class ChamadoController extends Controller
{
    public function index(){
        $total_chamados = DB::table('chamados')
        ->where('status', '=', 'Confirmado')
        ->count();

        $chamados = Chamado::all();

        return view('list-chamados-user', ['chamados' => $chamados, 'total' => $total_chamados]);
    }

    public function create(){
        $total_chamados = DB::table('chamados')
        ->where('status', '=', 'Confirmado')
        ->count();

        return view('add-chamado', ['total' => $total_chamados]);
    }

    public function store(Request $request){
        $chamado = new Chamado;
        $chamado->titulo = $request->titulo;
        $chamado->equipamento = $request->equipamento;
        $chamado->problema = $request->problema;
        $chamado->observacao = $request->observacao;
        $chamado->user_id = $request->user_id;
        $chamado->status = "Andamento";
        $chamado->save();
        return redirect()->route('user_user.index')->with('message', 'Chamado enviado com sucesso!');
    }

}
