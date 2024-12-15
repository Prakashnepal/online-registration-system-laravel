<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    // If the table name is not 'statuses', you should define it explicitly
    protected $table = 'statuses';

    // If you don't want to allow mass assignment for all fields
    protected $fillable = ['name'];
}
