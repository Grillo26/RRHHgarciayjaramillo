<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User ;

class AttendanceController extends Controller
{
    public function showCheckInForm()
    {
        return view('attendance.checkin');
    }

    // Registrar entrada
    public function checkIn(Request $request)
    {
        // Validar y registrar la hora de entrada del usuario
        $user_id = auth()->user()->id;
        $checkIn = now(); // Fecha y hora actual

        Attendance::create([
            'user_id' => $user_id,
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
        $user_id = auth()->user()->id;
        $checkOut = now(); // Fecha y hora actual

        $attendance = Attendance::where('user_id', $user_id)->latest()->first();
        $attendance->check_out = $checkOut;
        $attendance->save();

        return redirect()->back()->with('success', 'Hora de salida registrada con éxito.');
    }
}
