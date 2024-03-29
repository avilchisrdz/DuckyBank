<?php

namespace App\Http\Models\User;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->hasOne(Role::class); //ER: 1(user):1(role)
    }
    public function userStatus(){
        return $this->hasOne(UserStatus::class); //ER: 1(user):1(user status)
    } 
    public function cashierSession(){
        return $this->belongsTo(CashierSession::class); //ER: 1(user):1(cashier session)
    }      
}
