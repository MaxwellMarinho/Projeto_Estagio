<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index() {
        $usuarios = User::all();

        $total_chamados = DB::table('chamados')
        ->where('status', '=', 'Andamento')
        ->count();

        return view('list-users', ['usuarios' => $usuarios, 'total' => $total_chamados]);
    }

    public function show($id) {
        
    }

    public function edit($id){
        $user = User::findOrfail($id);
        return view('alter-user', compact('user'));
    }

    public function update(Request $request){
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nome_empresa = $request->nome_empresa;
        $user->nome_setor = $request->nome_setor;
        $user->role = $request->role;
        $user->save();
        return back();
    }

    public function destroy(Request $request) {
        $user = User::findOrFail($request->id);
        $user->delete();
        return back();
    }
}
