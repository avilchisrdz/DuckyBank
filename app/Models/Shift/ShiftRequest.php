<?php

namespace App\Models\Shift;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShiftRequest extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'shift_requests';
    protected $hidden = ['created_at', 'updated_at'];

    public function cashier(){
        return $this->hasOne(Cashier::class); //ER: 1(shift request):1(cashiers)
    } 
    public function shift(){
        return $this->hasOne(Shift::class); //ER: 1(shift request):1(shifts)
    }     
}
