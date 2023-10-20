<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;



use Illuminate\Http\Request;

class UserController extends Controller
{
    

    public function usuarios(){
        $users = User::all(); // Obtiene todos los usuarios de la base de datos
        return view('user.usuarios', compact('users')); // Pasa la lista de usuarios a la vista
    }

    public function show(){

        $today = Carbon::now()->toDateString(); // Obten la fecha actual en formato Y-m-d
        // Obtiene todos los usuarios registrados en el sistema
        $users = User::all();

        $historialAsistencia = [];
         // Obtén la fecha actual en formato Y-m-d
            $today = Carbon::now()->toDateString();

            // Recupera todos los usuarios y su asistencia para la fecha actual (incluso si no han registrado asistencia)
            $historialAsistencia = User::leftJoin('attendances', function($join) use ($today) {
                $join->on('users.id', '=', 'attendances.user_id')
                    ->whereDate('attendance_date', '=', $today);
            })
            ->select('users.*', 'attendances.check_in_morning', 'attendances.check_out_morning', 'attendances.check_in_afternoon', 'attendances.check_out_afternoon', 'attendances.attendance_date')
            ->get();

            // Formatea los datos, similar a tu código original
            foreach ($historialAsistencia as $usuario) {
                $campos = [
                    'check_in_morning' => 'H:i:s',
                    'check_out_morning' => 'H:i:s',
                    'check_in_afternoon' => 'H:i:s',
                    'check_out_afternoon' => 'H:i:s'
                ];

                foreach ($campos as $campo => $formato) {
                    if (is_null($usuario->$campo)) {
                        $usuario->$campo = 'No registrado';
                    } else {
                        $usuario->$campo = Carbon::parse($usuario->$campo)->format($formato);
                    }
                }

                $usuario->attendance_date = Carbon::parse($usuario->attendance_date)->format('d-m-Y');
            }

            return view('user.registrar', compact('historialAsistencia')); // Pasa la lista de usuarios a la vista

    }

    public function edit($id){
        $attendance = Attendance::find($id);

        if (!$attendance) {
            return redirect()->route('user.asistencia')
                ->with('error', 'Registro de asistencia no encontrado.');
        }

        return view('user.asistencia', compact('attendance'));
    }

    public function update(Request $request, $id){
    $request->validate([
        'check_in_morning' => 'nullable|date_format:H:i',
        'check_out_morning' => 'nullable|date_format:H:i',
        'check_in_afternoon' => 'nullable|date_format:H:i',
        'check_out_afternoon' => 'nullable|date_format:H:i',
    ]);

    $attendance = Attendance::find($id);

    if (!$attendance) {
        return redirect()->route('asistencia.index')
            ->with('error', 'Registro de asistencia no encontrado.');
    }

    $attendance->check_in_morning = $request->input('check_in_morning');
    $attendance->check_out_morning = $request->input('check_out_morning');
    $attendance->check_in_afternoon = $request->input('check_in_afternoon');
    $attendance->check_out_afternoon = $request->input('check_out_afternoon');

    $attendance->save();

    return redirect()->route('asistencia.index')
        ->with('success', 'Registro de asistencia actualizado con éxito.');
    }
}
