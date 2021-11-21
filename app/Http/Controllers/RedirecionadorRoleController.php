<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class RedirecionadorRoleController extends Controller
{
    public function index(){
        return view('redirecionador-role');
    }
}
