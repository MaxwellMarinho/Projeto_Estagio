<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UsuarioHomeController extends Controller
{
    public function index(){
        $total_chamados = DB::table('chamados')
            ->where('status', '=', 'Andamento')
            ->count();

        $ano = date('Y');

        $jan = DB::table('chamados')
            ->whereMonth('created_at', '01')
            ->whereYear('created_at', $ano)
            ->count();

        $fev = DB::table('chamados')
            ->whereMonth('created_at', '02')
            ->whereYear('created_at', $ano)
            ->count();

        $mar = DB::table('chamados')
            ->whereMonth('created_at', '03')
            ->whereYear('created_at', $ano)
            ->count();

        $abr = DB::table('chamados')
            ->whereMonth('created_at', '04')
            ->whereYear('created_at', $ano)
            ->count();

        $mai = DB::table('chamados')
            ->whereMonth('created_at', '05')
            ->whereYear('created_at', $ano)
            ->count();

        $jun = DB::table('chamados')
            ->whereMonth('created_at', '06')
            ->whereYear('created_at', $ano)
            ->count();

        $jul = DB::table('chamados')
            ->whereMonth('created_at', '07')
            ->whereYear('created_at', $ano)
            ->count();

        $ago = DB::table('chamados')
            ->whereMonth('created_at', '08')
            ->whereYear('created_at', $ano)
            ->count();

        $set = DB::table('chamados')
            ->whereMonth('created_at', '09')
            ->whereYear('created_at', $ano)
            ->count();

        $out = DB::table('chamados')
            ->whereMonth('created_at', '10')
            ->whereYear('created_at', $ano)
            ->count();

        $nov = DB::table('chamados')
            ->whereMonth('created_at', '11')
            ->whereYear('created_at', $ano)
            ->count();

        $dez = DB::table('chamados')
            ->whereMonth('created_at', '12')
            ->whereYear('created_at', $ano)
            ->count();

        return view('home-adm', ['total' => $total_chamados,
            'jan' => $jan, 
            'fev' => $fev,
            'mar' => $mar,
            'abr' => $abr,
            'mai' => $mai,
            'jun' => $jun,
            'jul' => $jul,
            'ago' => $ago,
            'set' => $set,
            'out' => $out,
            'nov' => $nov,
            'dez' => $dez ]);
    }
}
