<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['user_id', 'check_in_morning', 'check_out_morning', 
    'check_in_afternoon', 'check_out_afternoon','attendance_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
