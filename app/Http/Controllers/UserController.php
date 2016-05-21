<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\initAppRequest;
use App\Http\Requests\setGenderRequest;
use App\Http\Requests\setBrandRequest;
use App\Models\User as User;
use App\Models\Brand as Brand;
use Input;

class UserController extends Controller
{
    public function setGender(setGenderRequest $request)
    {
    	$input = $request->all();
    	$user = User::create([
    		'userId'		=> $input['dev'],
    		'prefGender'	=> $input['gender'],
    		'role_id'		=> 2
    	]);

    	return response()->json([
    		'error'	=> 0,
    		'data'	=> 'Gender '.$input['gender'].' saved!'
    	]);
    }

    public function setBrands(setBrandRequest $request)
    {
    	$input = $request->all();
    	$user = User::findOrFail($input['dev']);

        $user->prefBrands = $input['brands'];
        $user->save();
        return response()->json([
        	'error' => 0, 
        	'data' => 'Brands '.$input['brands'].' add!'
        ]);
    }

    public function getBrands()
    {
    	$brands = Brand::getBrands();
    	return response()->json([
    		'error'	=> 0,
    		'data'  =>$brands
    	]);
    }


    public function setBoth(initAppRequest $request)
    {
    	$input = $request->all();
    	$user = User::add($input);

    	return response()->json([
    		'error'	=> 0,
    		'data'	=> 'gender '.$input['gender'].' saved',
            'token' => $input['dev']
    	]);
    }

    public function getUserPref()
    {
        $input = Input::all();
        $user = User::findOrFail($input['dev']);
        return response()->json([
            'error' => 0, 
            'data'  => [
                'prefGender' => $user['prefGender'],
                'prefBrands' => explode(';', $user['prefBrands'])
            ]
        ]);
    }
    
}
