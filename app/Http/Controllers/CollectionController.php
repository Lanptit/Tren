<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\getProdInColRequest;
use App\Http\Requests\getAllFavorColRequest;
use Input;
use App\Models\Collection;
use App\Models\Brand;


class CollectionController extends Controller
{

	/** 
	* confirm app: if not item in cols???
	*/
    public function getCol(getCollectRequest $request)
    {
    	$input = $request->all();
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

    public function colAction(getProdInColRequest $request)
    {
        $input = $request->all();        
        $data = Collection::getProdInCollect($input['dev'], $input['col']);

        return response()->json([
            'error' => 0,
            'data'  => $data
        ]);
    }

    public function colsAction(getAllFavorColRequest $request)
    {
        $input= $request->all();
        $header = [
            'headerImageUrl'    => get_image_size_url("https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRw2GNAmQdfieYxQGcd0HnNFVr0oYATxPjlQ7X7F7KDXKmikOi6KA"),
            'headerTitle'       => 'My collections, sub-title',
            'headerSubTitle'    => 'Favorite collections for user '.$input['dev'].', subtitle'
        ];

        $items = Collection::getAllFavorCol($input['dev']);
        return response()->json([
            'error' => 0,
            'data'  => [
                            'header'    => $header,
                            'items'     => $items
                       ]
        ]);

    }
}
