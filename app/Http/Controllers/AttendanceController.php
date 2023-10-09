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

        return view('attendance.historial');
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
            
            $checkOutMorning = $lastAttendance->check_out_morning;
            $checkInMorning = $lastAttendance->check_in_morning;
            $checkInDate = Carbon::parse($lastAttendance->attendance_date)->format('d-m-Y');


            if ($checkOutMorning === null) {
                $checkOutMorning = "No registro";
            }else{
                $checkOutMorning = Carbon::parse($lastAttendance->check_out_morning)->format('H:i:s');
            }
            if ($checkInMorning === null) {
                $checkInMorning = "No registro";
            }else{
                $checkInMorning = Carbon::parse($lastAttendance->check_in_morning)->format('H:i:s');
            }

        }

        return view('attendance.historial', [
            'checkInMorning' => $checkInMorning,
            'checkOutMorning' => $checkOutMorning,
            'checkInDate' => $checkInDate,
        ]);

    }
}
