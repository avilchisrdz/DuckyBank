<?php

namespace App\Http\Models\Cashier;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashierStatus extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'cashier_status';
    protected $hidden = ['created_at', 'updated_at'];

    public function cashier(){
        return $this->belongsToMany(Cashier::class); //ER: 1(cashier status):N(cashiers)
    }      
}
