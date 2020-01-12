<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
      'nis', 'student_name', 'class', 'address', 'number_phone'
    ];
   
}
