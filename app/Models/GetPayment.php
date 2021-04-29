<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetPayment extends Model
{
    use HasFactory;
    public function class(){
    	return $this->belongsTo(ManageClass::class, 'class_id');
    }
    public function set_payment(){
    	return $this->belongsTo(SetPayment::class, 'set_payment_id');
    }
}
