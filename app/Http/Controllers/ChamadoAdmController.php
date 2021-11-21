<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Chamado;
use Illuminate\Support\Facades\DB;

class ChamadoAdmController extends Controller
{
    public function index(){
        $total_chamados = DB::table('chamados')
        ->where('status', '=', 'Andamento')
        ->count();

        $chamados = DB::table('chamados')
        ->join('users','chamados.user_id','users.id')
        ->select('chamados.*','users.name')
        ->get();

        return view('list-chamados-adm', ['total' => $total_chamados, 'chamados' => $chamados]);
    }

    public function create(){
        $total_chamados = DB::table('chamados')
        ->where('status', '=', 'Andamento')
        ->count();

        return view('add-chamado-adm', ['total' => $total_chamados]);
    }

    public function store(Request $request){
        $chamado = new Chamado;
        $chamado->titulo = $request->titulo;
        $chamado->equipamento = $request->equipamento;
        $chamado->problema = $request->problema;
        $chamado->observacao = $request->observacao;
        $chamado->user_id = $request->user_id;
        $chamado->save();
        return redirect()->route('user_admin_chamado.index')->with('message', 'Chamado enviado com sucesso!');
    }

    public function destroy(Request $request) {
        $chamado = Chamado::findOrFail($request->id);
        $chamado->delete();
        return back();
    }
}
