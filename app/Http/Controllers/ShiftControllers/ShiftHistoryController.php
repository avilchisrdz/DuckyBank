<?php

namespace App\Http\Controllers\ShiftControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Shift\ShiftHistory;
use App\Http\Models\Shift\Shift;

class ShiftHistoryController extends Controller
{
    public function getShiftHistories(){
    	$shiftHistoriesCatch = Shift::orderBy('created_at', 'Desc')->get();
    	$data = ['shiftHistoriesCatch' => $shiftHistoriesCatch];
    	return view('shift.shifthistory.dashshifthistory', $data);  
    }     

}
