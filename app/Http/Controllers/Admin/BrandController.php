<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Input;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware(array('auth', 'role'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'desc')->paginate(20);
        return view('back.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $input = $request->all();
        $brand = Brand::add($input);
        return redirect()->route('brand.index')->with('status', 'Brand created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        return view('back.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('back.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $brand = Brand::saveDB($input, $id);
        return redirect()->route('brand.index')->with('status', 'Brand updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        unlink(public_path().'/assets/image/'.$brand->brandLogoUrl);
        unlink(public_path().'/assets/image/'.$brand->brandHeaderUrl);
        return redirect()->route('brand.index')->with('status', 'Brand deleted!');
    }
}
