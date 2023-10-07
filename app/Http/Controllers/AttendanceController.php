<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function showCheckInMorningForm()
    {

        $user = auth()->user();
        $today = now()->format('Y-m-d');

        // Verificar si ya se registró la asistencia completa de la mañana para acceder a la asistencia por la tarde
        $morningAttendanceFull = $user->attendances()
        ->whereDate('check_in_morning', $today)
        ->whereNotNull('check_out_morning')
        ->first();
        if ($morningAttendanceFull) {
            return view('attendance.verificacionTarde');
        }

        // Verificar si ya se registró la asistencia de la mañana
        $morningAttendance = $user->attendances()
            ->whereDate('check_in_morning', $today)
            ->first();

        if ($morningAttendance) {
            return view('attendance.verificacion');
        }

        return view('attendance.checkin_morning');
    }

    public function checkInMorning(Request $request)
    {
        $user = auth()->user();
        $checkInMorning = now();
        $today = now()->format('Y-m-d');

        // Registrar la asistencia de la mañana
        Attendance::create([
            'user_id' => $user->id,
            'check_in_morning' => $checkInMorning,
            'attendance_date' => $today
        ]);

        return redirect()->back()->with('success', 'Asistencia de la mañana registrada con éxito.');
    }

    public function showCheckOutMorningForm()
    {
        $user = auth()->user();
        $today = now()->format('Y-m-d');

        // Verificar si ya se registró la asistencia de la mañana
        $morningAttendance = $user->attendances()
            ->whereDate('check_in_morning', $today)
            ->first();

        if (!$morningAttendance) {
            return redirect()->back()->with('error', 'No has registrado tu asistencia de la mañana.');
        }

        // Verificar si ya se registró la salida de la mañana
        if ($morningAttendance->check_out_morning) {
            return redirect()->back()->with('error', 'Ya has registrado tu salida de la mañana.');
        }

        return view('attendance.checkout_morning');
    }

    public function checkOutMorning(Request $request)
    {
        $user = auth()->user();
        $checkOutMorning = now();

        // Actualizar el registro de asistencia con la salida de la mañana
        $morningAttendance = $user->attendances()
            ->whereDate('check_in_morning', now()->format('Y-m-d'))
            ->first();

        $morningAttendance->check_out_morning = $checkOutMorning;
        $morningAttendance->save();

        return redirect()->back()->with('success', 'Salida de la mañana registrada con éxito.');
    }

    public function historial(){
        $user = auth()->user();
        // Obtener el registro de asistencia más reciente
        $lastAttendance = $user->attendances()->latest()->first();

        // Inicializar variables para la hora y la fecha
        $checkInMorning = null;
        $checkOutMorning = null;
        $checkInDate = null;

        // Verificar si se encontró un registro de asistencia
        if ($lastAttendance) {
            // Extraer la hora y la fecha de check-in utilizando Carbon
            $checkInMorning = Carbon::parse($lastAttendance->check_in_morning)->format('H:i:s');
            $checkOutMorning = Carbon::parse($lastAttendance->check_out_morning)->format('H:i:s');
            $checkInDate = Carbon::parse($lastAttendance->attendance_date)->format('Y-m-d');
        }

        return view('attendance.historial', [
            'checkInMorning' => $checkInMorning,
            'checkOutMorning' => $checkOutMorning,
            'checkInDate' => $checkInDate,
        ]);

    }
}
