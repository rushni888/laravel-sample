<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_list extends Model
{
    protected $fillable = ['name','place','contact','address','course','image','username','password'];
}
