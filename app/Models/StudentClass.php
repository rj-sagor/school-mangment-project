<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;
   public function classTouser(){
    return $this->belongsTo(User::class,'added_by','id');
   }
   protected $guarded =[]; 
}
