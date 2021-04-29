<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public function cls(){
    	return $this->belongsTo(ManageClass::class, 'class_id');
    }
    public function mark_distributions(){
    	return $this->hasMany(MarkDistribution::class, 'subject_id');
    }
}
