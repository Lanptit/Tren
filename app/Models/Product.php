<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'prodId';
    public $incrementing = false;

    protected $fillable = [
    	'prodId', 'prodName', 'prodPrice', 'prodImageUrl', 'prodDetailUrl', 'catalogUrl', 'tagWhat',
        'tagForWhom', 'tagBrand', 'tagSupplier','tagPromotion', 'tagArrival', 'tagNavbar', 'tagNavbarUrl'
    ];

    public function prodImages()
    {
    	return $this->hasMany('App\Models\Product_Image', 'prodId', 'prodId');
    }

    public function collections()
    {
        return $this->belongsToMany('App\Models\Collection', 'collection_products', 'productId', 'collectId');
    }

    public static function getProductLikedOrAlerted($dev, $prod, $collectType)
    {
        $prodLikedOrAlerted = false;
        $col = Collection::findCollect($dev, $collectType);
        if(!is_null($col)) {
            $colProd = Collection_Product::where('collectId', $col->collectId)->where('productId', $prod)->first();
            $prodLikedOrAlerted = is_null($colProd)? $prodLikedOrAlerted : true;
        }
        return $prodLikedOrAlerted;
    }

    public static function prodLikeOrAlert($dev, $prod, $collectType)
    {
        $prodLikeOrAlert = Product::getProductLikedOrAlerted($dev, $prod, $collectType);
        if(!$prodLikeOrAlert) {
            $collecName = ($collectType === 'user/like')? 'like' : 'alert';
            $collectId = Collection::saveProd($dev, $collecName, $collectType);
            $colProd = Collection_Product::saveProdInCollect($collectId, $prod);
        } else {
            $collectId = Collection::findCollect($dev, $collectType)->collectId;
            $colProd = Collection_Product::where('collectId', $collectId)->where('productId', $prod)->delete();
        }

        $prodAlerted= Product::getProductLikedOrAlerted($dev, $prod, 'user/alert');
        $prodLiked = Product::getProductLikedOrAlerted($dev, $prod, 'user/like');
        return ['productLiked' => $prodLiked, 'productAlerted' => $prodAlerted];
    }

}
