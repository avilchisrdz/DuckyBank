<?php

namespace App\Models\Cashier;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cashier extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'cashiers';
    protected $hidden = ['created_at', 'updated_at'];

    public function cashierStatus(){
        return $this->hasOne(CashierStatus::class); //ER: 1(cashier):1(cashier status)
    }      
    public function cashierSession(){
    	return $this->belongsTo(CashierSession::class); //ER: 1(cashier):1(cashier session)
    }
}
