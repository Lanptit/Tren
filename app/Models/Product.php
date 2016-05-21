<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'prodId';
    public $incrementing = false;

    protected $fillable = [
    	'prodId', 'prodName', 'prodPrice', 'prodImageUrl', 'prodDetailUrl',
    	'catalogUrl', 'tagWhat', 'tagForWhom', 'tagBrand', 'tagSupplier',
    	'tagPromotion', 'tagArrival', 'tagNavbar', 'tagNavbarUrl'
    ];

    public function prodImages()
    {
    	return $this->hasMany('App\Models\Product_Image', 'prodId', 'prodId');
    }

    public function collections()
    {
        return $this->belongsToMany('App\Models\Collection', 'collection_products', 'productId', 'collectId');
    }
}
