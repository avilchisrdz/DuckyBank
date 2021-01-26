<?php

namespace App\Models\Cashier;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashierSession extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'cashier_sessions';
    protected $hidden = ['created_at', 'updated_at'];

    public function cashier(){
        return $this->hasMany(Cashier::class); //ER: 1(cashier session):N(cashiers)
    }
    public function user(){
        return $this->hasMany(User::class); //ER: 1(cashier session):N(users)
    }          
}