<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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

        $brandLogo = Brand::where('brandName', $product['tagBrand'])->select('brandLogoUrl')->first();
        $brandLogoUrl = is_null($brandLogo)? '' : $brandLogo->brandLogoUrl;
        
        $colLike = Collection::findCollect($input['dev'], 'user/like');
        if(!is_null($colLike)) {
        	$prod = Collection_Product::where('collectId', $colLike->collectId)->where('productId', $input['prod'])->first();
        	$productLiked = is_null($prod)? false: true;
        } else {
        	$productLiked = false;
        }

        $colAlert = Collection::findCollect($input['dev'], 'user/alert');
        if(!is_null($colAlert)) {
        	$prod = Collection_Product::where('collectId', $colAlert->collectId)->where('productId', $input['prod'])->first();
        	$productAlerted = is_null($prod)? false : true;
        } else {
        	$productAlerted = false;
        }

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
}
