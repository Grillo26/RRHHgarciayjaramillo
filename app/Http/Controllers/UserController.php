<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        $users = User::all(); // Obtiene todos los usuarios de la base de datos
        return view('users.show', compact('users')); // Pasa la lista de usuarios a la vista
    }
}
