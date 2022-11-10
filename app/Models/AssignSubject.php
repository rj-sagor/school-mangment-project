<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;
    protected $guarded =[]; 


    public function assignreliationclass(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
      }

      public function assign_riletion_subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
      }
}
