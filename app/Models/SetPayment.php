<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetPayment extends Model
{
    use HasFactory;
    public function cls(){
    	return $this->belongsTo(ManageClass::class, 'class_id');
    }
}
