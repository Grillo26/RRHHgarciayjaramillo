<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;



use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        $users = User::all(); // Obtiene todos los usuarios de la base de datos
        return view('user.registrar', compact('users')); // Pasa la lista de usuarios a la vista
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'check_in_morning' => 'nullable|date_format:H:i',
            'check_out_morning' => 'nullable|date_format:H:i',
            'check_in_afternoon' => 'nullable|date_format:H:i',
            'check_out_afternoon' => 'nullable|date_format:H:i',
            // Otras validaciones
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Combina la fecha actual con la hora ingresada por el usuario
        $checkInMorning = Carbon::now()->format('Y-m-d') . ' ' . $request->input('check_in_morning');
        $checkOutMorning = Carbon::now()->format('Y-m-d') . ' ' . $request->input('check_out_morning');
        $checkInAfternoon = Carbon::now()->format('Y-m-d') . ' ' . $request->input('check_in_afternoon');
        $checkOutAfternoon = Carbon::now()->format('Y-m-d') . ' ' . $request->input('check_out_afternoon');

        // Agrega la fecha de hoy al campo attendance_date
        $attendanceDate = Carbon::today()->toDateString();

    
        // Guarda el registro en la base de datos
        Attendance::create([
            'user_id' => $request->input('user_id'),
            'check_in_morning' => $checkInMorning,
            'check_out_morning' => $checkOutMorning,
            'check_in_afternoon' => $checkInAfternoon,
            'check_out_afternoon' => $checkOutAfternoon,
            'attendance_date' => $attendanceDate,
            // Otros campos
        ]);

        return redirect()->back()->with('Registrado', 'Asistencia registrada con éxito.');
    }
}
