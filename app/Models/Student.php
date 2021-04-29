<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function guardian(){
    	return $this->hasOne(Guardian::class, 'student_id');
    }
    public function registration(){
    	return $this->hasOne(Registration::class, 'student_id')->orderBy('id', 'desc');
    }

}
