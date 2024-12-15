<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRemark extends Model
{
    use HasFactory;
    protected $table = 'student_remarks';
    // public $timestamps = false;
    protected $fillable = [
        'studentid',
        'status_id',
        'remark',
    ];
    // Define the relationship with the StudentRegistration model
    public function studentRegistration()
    {
        return $this->belongsTo(StudentRegistration::class, 'studentid', 'id');
    }
}
