<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\saveProdInCollectRequest;
use App\Http\Requests\shareProdRequest;
use App\Http\Requests\likeProdRequest;
use App\Http\Requests\alertProdRequest;
use Input;
use App\Models\Product;
use App\Models\Collection;
use App\Models\Brand;
use App\Models\Collection_Product;

class ProductController extends Controller
{
    public function view()
    {
    	$input = Input::all();
    	$product = Product::findOrFail($input['prod']);

        $productImages= $product->prodImages;

        $productImageUrlArray = [];
        foreach ($productImages as $prodImage) {
            array_push($productImageUrlArray, get_image_size_url($prodImage->imageUrl));
        }

        $brandLogoUrl = Brand::getBrandLogo($product['tagBrand']);

        $productLiked = Product::getProductLikedOrAlerted($input['dev'], $input['prod'], 'user/like');
        $productAlerted = Product::getProductLikedOrAlerted($input['dev'], $input['prod'], 'user/alert');

    	return response()->json([
            'error' => '0', 
            'data'  => [
                'productId'             => $product['prodId'],
                'productTitle'          => $product['prodName'],
                'productSubTitle'       => $product['prodName'],
                'productImageUrlArray'  => $productImageUrlArray,
                'productLikeUrl'        => route('prodLike').'?dev='.$input['dev'].'&prod='.$product['prodId'],
                'productSaveUrl'        => route('prodSave').'?dev='.$input['dev'].'&prod='.$product['prodId'],
                'productShareUrl'       => route('prodShare').'?dev='.$input['dev'].'&prod='.$product['prodId'],
                'productAlertUrl'       => route('prodAlert').'?dev='.$input['dev'].'&prod='.$product['prodId'],
                'productLiked'          => $productLiked,
                'productAlerted'        => $productAlerted,
                'productBuyNowUrl'      => $product['prodDetailUrl'],
                'productBuyAt'          => $product['tagBrand'],
                'brandName'             => $product['tagBrand'],
                'brandLogo'             => $brandLogoUrl
            ]

        ]);
    }

    public function save(saveProdInCollectRequest $request)
    {
        $input = $request->all();
        $prod = Product::findOrFail($input['prod']);
        $collectId = Collection::saveProd($input['dev'], $input['colname'], 'user/save');
        $colProd = Collection_Product::saveProdInCollect($collectId, $input['prod']);
        return response()->json([
            'error' => 0,
            'data'  => 'User ' . $input['dev'] . ' saved product ' . $input['prod'] . ' in collection ' . $collectId
        ]);
    }

    public function share(shareProdRequest $request)
    {
        $input = $request->all();
        $prod = Product::findOrFail($input['prod']);

        $collectId = Collection::share($input['dev']);
        $colProd = Collection_Product::saveProdInCollect($collectId, $input['prod']);
        return response()->json([
            'error' => 0,
            'data'  => 'User ' . $input['dev'] . ' shared product ' . $input['prod'] . ' on ' . $input['tar']
        ]);
    }

    public function like(likeProdRequest $request)
    {
        $input = $request->all();
        $data = Product::prodLikeOrAlert($input['dev'], $input['prod'], 'user/like');
        return response()->json([
            'error' => 0,
            'data'  => $data
        ]);
    }

    public function alert(alertProdRequest $request)
    {
        $input = $request->all();
        $data = Product::prodLikeOrAlert($input['dev'], $input['prod'], 'user/alert');
        return response()->json([
            'error' => 0,
            'data'  => $data
        ]);       
    }
}
