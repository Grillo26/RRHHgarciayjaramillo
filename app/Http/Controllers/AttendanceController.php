<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class AttendanceController extends Controller
{
    public function showCheckInMorningForm()
    {

        $user = auth()->user();
        $today = now()->format('Y-m-d');

        // Verificar si ya se registró la asistencia completa de la mañana 
        $morningAttendanceFull = $user->attendances()
        ->whereDate('check_in_morning', $today)
        ->whereNotNull('check_out_morning')
        ->first();

        //Verifica si ya se registró la asistencia completa de la tarde
        $afternoonAttendanceFull = $user->attendances()
        ->whereDate('check_in_afternoon', $today)
        ->whereNotNull('check_out_afternoon')
        ->first();

        //Verificacion si registro completo todo el día
        if ($morningAttendanceFull && $afternoonAttendanceFull !== null) {
            return view('attendance.verificacionFinal');
        }

        // Verificar si ya se registró la asistencia de entrada por la tarde
        $afternoonAttendance = $user->attendances()
            ->whereDate('check_in_afternoon', $today)
            ->first();

        //Verificacion si registro ingreso y salida mañana e ingreso tarde
        if ($morningAttendanceFull && $afternoonAttendance !== null) {
            return view('attendance.verificacionIngresoTarde');
        }

        //Verificacion si registro ingreso y salida mañana
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

        return redirect()->back()->with('Registrado', 'Asistencia de la mañana registrada con éxito.');
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

        return view('attendance.verificacionTarde');
        return redirect()->back()->with('success', 'Salida de la mañana registrada con éxito.');
    }

    public function historial(){
        $user = auth()->user();
        $today = now()->format('Y-m-d');

        // Realiza una consulta para verificar si hay registros para el día de hoy
        $registrosHoy = Attendance::where('user_id', $user->id)
        ->whereDate('attendance_date', $today)
        ->count();

        if ($registrosHoy === 0) {
            // No hay registros para el día de hoy
            return view('attendance.empty');
        }
        // Obtener el registro de asistencia más reciente
        $lastAttendance = $user->attendances()->latest()->first();

        // Inicializar variables para la hora y la fecha
        $checkInMorning = null;
        $checkOutMorning = null;
        $checkInAfternoon = null;
        $checkOutAfternoon = null;
        $checkInDate = null;

        // Verificar si se encontró un registro de asistencia
        if ($lastAttendance) {
            
            $checkOutMorning = $lastAttendance->check_out_morning;
            $checkInMorning = $lastAttendance->check_in_morning;
            $checkOutAfternoon = $lastAttendance->check_out_afternoon;
            $checkInAfternoon = $lastAttendance->check_in_afternoon;
            $checkInDate = Carbon::parse($lastAttendance->attendance_date)->format('d-m-Y');


            if ($checkOutMorning === null) {
                $checkOutMorning = "No registrado";
            }else{
                $checkOutMorning = Carbon::parse($lastAttendance->check_out_morning)->format('H:i:s');
            }
            if ($checkInMorning === null) {
                $checkInMorning = "No registrado";
            }else{
                $checkInMorning = Carbon::parse($lastAttendance->check_in_morning)->format('H:i:s');
            }
            if ($checkOutAfternoon === null) {
                $checkOutAfternoon = "No registrado";
            }else{
                $checkOutAfternoon = Carbon::parse($lastAttendance->check_out_afternoon)->format('H:i:s');
            }
            if ($checkInAfternoon === null) {
                $checkInAfternoon = "No registrado";
            }else{
                $checkInAfternoon = Carbon::parse($lastAttendance->check_in_afternoon)->format('H:i:s');
            }

        }

        return view('attendance.historial', [
            'checkInMorning' => $checkInMorning,
            'checkOutMorning' => $checkOutMorning,
            'checkInAfternoon' => $checkInAfternoon,
            'checkOutAfternoon' => $checkOutAfternoon,
            'checkInDate' => $checkInDate,
        ]);

    }

    public function historialAll(){
        // Obtiene el usuario actualmente autenticado
        $user = auth()->user(); 

        // Obtiene el historial de asistencia del usuario actual
        $historialAsistencia = Attendance::where('user_id', $user->id)
            ->select('check_in_morning', 'check_out_morning', 'check_in_afternoon', 'check_out_afternoon', 'attendance_date')
            ->orderBy('attendance_date', 'desc')
            ->get();


         // Recorre y formatea los datos
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
                    $asistencia->$campo = 'No registrado';
                } else {
                    $asistencia->$campo = Carbon::parse($asistencia->$campo)->format($formato);
                }
            }

            $asistencia->attendance_date = Carbon::parse($asistencia->attendance_date)->format('d-m-Y');
        }

        return view('attendance.historial_asistencia', compact('historialAsistencia'));
    }


    //Ingreso tarde
    public function showCheckInAfternoonForm()
    {

        $user = auth()->user();
        $today = now()->format('Y-m-d');

        // Verificar si ya se registró la asistencia de la mañana
        $morningAttendance = $user->attendances()
            ->whereDate('check_out_morning', $today)
            ->first();

        if ($morningAttendance) {
            return view('attendance.checkin_afternoon');
        }

        return view('attendance.checkout_morning');
    }

    public function checkInAfternoon(Request $request)
    {
        $user = auth()->user();
        $checkInAfternoon = now();

        // Actualizar el registro de asistencia con el ingreso de la mañana
        $afternoonAttendance = $user->attendances()
            ->whereDate('check_out_morning', now()->format('Y-m-d'))
            ->first();

        $afternoonAttendance->check_in_afternoon = $checkInAfternoon;
        $afternoonAttendance->save();

        return view('attendance.verificacionIngresoTarde');
        return redirect()->back()->with('success', 'Ingreso registrado con éxito.');
    }

    public function showCheckOutAfternoonForm()
    {
        $user = auth()->user();
        $today = now()->format('Y-m-d');

        // Verificar si ya se registró la asistencia de la mañana
        $afternoonAttendance = $user->attendances()
            ->whereDate('check_in_afternoon', $today)
            ->first();

        return view('attendance.checkout_afternoon');
    }

    public function checkOutAfternoon(Request $request)
    {
        $user = auth()->user();
        $checkOutAfternoon = now();

        // Actualizar el registro de asistencia con la salida de la mañana
        $afternoonAttendance = $user->attendances()
            ->whereDate('check_in_afternoon', now()->format('Y-m-d'))
            ->first();

        $afternoonAttendance->check_out_afternoon = $checkOutAfternoon;
        $afternoonAttendance->save();

        return view('attendance.verificacionFinal');
        return redirect()->back()->with('success', 'Salida de la mañana registrada con éxito.');
    }

    
}
