<?php

namespace App\Models\Shift;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'shifts';
    protected $hidden = ['created_at', 'updated_at'];

    public function procedure(){
        return $this->hasOne(Procedure::class); //ER: 1(shift):1(procedure)
    } 
    public function shiftRequest(){
        return $this->belongsTo(ShiftRequest::class); //ER: 1(shift):1(shift requests)
    }              
}
