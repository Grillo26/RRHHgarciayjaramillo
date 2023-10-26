<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AsistenciaController extends Controller
{
    public function index(){

        $today = Carbon::now()->toDateString(); // Obten la fecha actual en formato Y-m-d
        $users = User::all(); 
        // Recupera todos los usuarios y su asistencia para la fecha actual (incluso si no han registrado asistencia)
        $historialAsistencia = User::leftJoin('asistencias', function($join) use ($today) {
            $join->on('users.id', '=', 'asistencias.user_id')
                ->whereDate('attendance_date', '=', $today);
        })
        ->select('users.*', 'asistencias.check_in_morning', 'asistencias.check_out_morning', 'asistencias.check_in_afternoon', 'asistencias.check_out_afternoon', 'attendances.attendance_date')
        ->get();

        return view('asistencia.users.index', compact('users'));
    }
}
