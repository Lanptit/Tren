<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection_Product extends Model
{
    protected $table = 'collection_products';
    protected $fillable = ['collectId', 'productId'];

    public static function saveProdInCollect($collectId, $productId)
    {
    	$colProd = Collection_Product::firstOrCreate(['collectId' => $collectId, 'productId' => $productId]);
    }
}
