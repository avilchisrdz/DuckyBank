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
	
    public function getShifts(){
    	$shiftHistoriesCatch = Shift::orderBy('created_at', 'Desc')->get();
		$infoHTML="";

		foreach ($shiftHistoriesCatch as $row) { 

			$infoHTML .=
			'
			<tr>
				<td class="shadow" style="font-size: 1.9rem; font-weight: bold; text-align: center;">'.$row["description"].'</td>
				<td style="font-size: 1.9rem; font-weight: bold; text-align: center;">'.$row["created_at"].'</td>
			</tr>			
			';
		}		
		
    	$data = [
			'shiftHistoriesCatch' => $infoHTML,
			'shiftSize' => $shiftHistoriesCatch->count()
		];
    	return json_encode($data);  
    } 
		

}
