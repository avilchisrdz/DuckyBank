<?php

namespace App\Http\Models\Shift;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShiftHistory extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'shift_histories';
    protected $hidden = ['created_at', 'updated_at'];

    public function cashier(){
        return $this->hasMany(Cashier::class); //ER: 1(shift history):N(cashiers)
    }
    public function user(){
        return $this->hasMany(User::class); //ER: 1(shift history):N(users)
    }  
}
