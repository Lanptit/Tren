<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use App\Models\Collection;

class CollectionController extends Controller
{

	/** 
	* confirm app: if not item in cols???
	*/
    public function getCol()
    {
    	$input = Input::all();
    	$cols = Collection::where('ownerId', $input['dev'])->select('collectName')->get();
    	// if(count($cols)) {
    		$collectNames = [];
    		foreach ($cols as $col) {
    			array_push($collectNames,['collectName' => $col->collectName ]);
    		}

    	return response()->json([
    		'error' 	=> 0,
    		'data'		=> $collectNames
    	]);	
    	// } else {

    	// }    	
    }
}
