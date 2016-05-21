<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use App\Models\Collection;

class CollectionController extends Controller
{
    public function getCol()
    {
    	$input = Input::all();
    	$cols = Collection::where('ownerId', $input['dev'])->get();
    }
}
