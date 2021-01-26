<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'roles';
    protected $hidden = ['created_at', 'updated_at'];

    public function user(){
        return $this->belongsToMany(User::class); //ER: 1(role):N(users)
    }    
}
