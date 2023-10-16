<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        $users = User::all(); // Obtiene todos los usuarios de la base de datos
        return view('user.show', compact('users')); // Pasa la lista de usuarios a la vista
    }

    public function showRegister(){
        // Obtén todos los usuarios registrados
        $users = User::all();

        // Crear un arreglo para almacenar el historial de asistencia
        $attendanceData = [];

        foreach ($users as $user) {
            // Busca el historial de asistencia para cada usuario
            $historialAsistencia = Attendance::where('user_id', $user->id)
                ->select('check_in_morning', 'check_out_morning', 'check_in_afternoon', 'check_out_afternoon', 'attendance_date')
                ->orderBy('attendance_date', 'desc')
                ->get();

            // Formatea los datos para cada usuario
            $formattedHistorial = [];
            foreach ($historialAsistencia as $asistencia) {
                $campos = [
                    'check_in_morning' => 'H:i:s',
                    'check_out_morning' => 'H:i:s',
                    'check_in_afternoon' => 'H:i:s',
                    'check_out_afternoon' => 'H:i:s'
                ];

                // Verifica y reemplaza los valores nulos
                foreach ($campos as $campo => $formato) {
                    if (is_null($asistencia->$campo)) {
                        $formattedHistorial[$asistencia->attendance_date][$campo] = 'No registrado';
                    } else {
                        $formattedHistorial[$asistencia->attendance_date][$campo] = Carbon::parse($asistencia->$campo)->format($formato);
                    }
                }
            }

            $attendanceData[] = [
                'user' => $user,
                'formattedHistorial' => $formattedHistorial,
            ];
        }

        return view('user.registrar', compact('attendanceData'));

    }
}
