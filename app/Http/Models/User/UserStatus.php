<?php

namespace App\Http\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserStatus extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'user_statuses';
    protected $hidden = ['created_at', 'updated_at'];

    public function user(){
        return $this->belongsToMany(User::class); //ER: 1(user status):N(users)
    }          
}
