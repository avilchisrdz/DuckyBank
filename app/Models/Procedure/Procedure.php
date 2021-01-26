<?php

namespace App\Models\Procedure;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Procedure extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'procedures';
    protected $hidden = ['created_at', 'updated_at'];
    
    public function shift(){
        return $this->belongsToMany(Shift::class); //ER: 1(procedure):N(shifts)
    } 
}
