<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    use HasFactory;
    protected $guarded =[]; 
    public function amountRletionFeeCate(){
      return $this->belongsTo(StudentFee::class,'fee_category_id','id');
    }

    public function amountRletionClass(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
      }
}
