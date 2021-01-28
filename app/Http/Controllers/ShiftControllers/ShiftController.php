<?php

namespace App\Http\Controllers\ShiftControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Shift\Shift;

class ShiftController extends Controller
{
/*    public function getShift($id){
    	$shiftsCatch = Shift::orderBy('created_at', 'Desc')->get();
    	$data = ['shiftsCatch' => $shiftsCatch];
    	return view('shifts.shift', $data);
    }*/ 
    public function getShift(){
    	$shiftsCatch = Shift::orderBy('created_at', 'Desc')->get();
    	$data = ['shiftsCatch' => $shiftsCatch];
    	return view('shift.shift', $data);  
    }      
}
