<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProductFormRequest;
use App\Http\Controllers\Controller;
use Input;
use App\Models\Brand;
use App\Models\Product;
use DB;

class ProductController extends Controller
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
        $products = Product::orderBy('created_at', 'DESC')->simplePaginate(25);
        return view('back.products.index', compact('products'));
    }

    public function dataForForm()
    {
        $brands = DB::table('brands')->select('brandName')->get();
        $brandName = [];
        foreach ($brands as $brand) {
            $brandName[$brand->brandName] = $brand->brandName;
        }

        $productTypes = Product::select('tagWhat')->get();
        $types = [];
        foreach ($productTypes as $prodType) {
            if(!in_array($prodType['tagWhat'], $types) && !empty($prodType['tagWhat'])) {
                $types[$prodType['tagWhat']] = $prodType['tagWhat'];
            }
        }
        $gender = ['Men' => 'Men', 'Women' => 'Women', 'Kid' => 'Kid', 'Unisex' => 'Unisex'];
        return ['brandName' => $brandName, 'types' => $types, 'gender' => $gender];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->dataForForm();
        return view('back.products.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $input = $request->all();
        $prod = Product::add($input);
        return redirect()->route('product.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prod = Product::findOrFail($id);
        return view('back.products.show', compact('prod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->dataForForm();
        $prod = Product::findOrFail($id);
        return view('back.products.edit', compact('prod', 'data'));

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
        // dump($input); die;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Product::find($id);
        $prod->delete();
        return redirect()->route('product.index')->with('status', 'Product deleted!');
    }
}
