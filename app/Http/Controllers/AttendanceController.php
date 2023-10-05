<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;

class AttendanceController extends Controller
{
    // Mostrar formulario de entrada
    public function showCheckInForm()
    {
        // Verificar si el usuario ya ha registrado su ingreso
        $user = auth()->user();
        $lastAttendance = $user->attendances()->latest()->first();

        if ($lastAttendance && $lastAttendance->check_out === null) {
            return redirect()->back()->with('error', 'Ya has registrado tu ingreso.');
        }

        return view('attendance.checkin');
    }

    // Registrar entrada
    public function checkIn(Request $request)
    {
        // Verificar si el usuario ya ha registrado su ingreso
        $user = auth()->user();
        $lastAttendance = $user->attendances()->latest()->first();

        if ($lastAttendance && $lastAttendance->check_out === null) {
            return redirect()->back()->with('error', 'Ya has registrado tu ingreso.');
        }

        // Validar y registrar la hora de entrada del usuario
        $checkIn = now(); // Fecha y hora actual

        Attendance::create([
            'user_id' => $user->id,
            'check_in' => $checkIn,
        ]);

        return redirect()->back()->with('success', 'Asistencia registrada con éxito.');
    }

    // Mostrar formulario de salida
    public function showCheckOutForm()
    {
        return view('attendance.checkout');
    }

    // Registrar salida
    public function checkOut(Request $request)
    {
        // Validar y registrar la hora de salida del usuario
        $user = auth()->user();
        $checkOut = now(); // Fecha y hora actual

        $lastAttendance = $user->attendances()->latest()->first();
        
        if (!$lastAttendance || $lastAttendance->check_out !== null) {
            return redirect()->back()->with('error', 'No tienes un registro de entrada válido.');
        }

        $lastAttendance->check_out = $checkOut;
        $lastAttendance->save();

        return redirect()->back()->with('success', 'Hora de salida registrada con éxito.');
    }
}
