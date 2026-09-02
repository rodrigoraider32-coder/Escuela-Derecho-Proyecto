<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ControllerUsuarios extends Controller
{
    public function index() {
        
        $usuarios = User::all();

        return view('usuarios', compact ('usuarios'));
    }


}
