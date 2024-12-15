<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class StudentRegistration extends Model
{
    use Notifiable;
    use HasFactory;
    protected $table = 'student_registrations';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $fillable = [
        's_first',
        's_middle',
        's_last',
        's_dob',
        's_phone',
        's_email',
        's_gender',
        's_country',
        's_province',
        's_district',
        's_city',
        's_ward',
        's_course',
        's_about',
        'g_first',
        'g_middle',
        'g_last',
        'relation',
        'g_phone',
        'g_email',
        'e_phone',
        'college',
        'faculty',
        'c_gpa',
        'c_country',
        'c_province',
        'c_district',
        'c_city',
        'status_id',
        'referred',
        'r_others',
    ];

    public function getFullNameAttribute()
    {
        return trim($this->s_first . ' ' . ($this->s_middle ? $this->s_middle . ' ' : '') . $this->s_last);
    }

    // Define the relationship with the StudentRemark model
    public function remarks()
    {
        return $this->hasMany(StudentRemark::class, 'studentid', 'id');
    }
    // Define the relationship with the Status model
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
