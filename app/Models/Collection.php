<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';
    protected $primaryKey = 'collectId';
    public $incrementing = false;

    public function products()
    {
    	return $this->belongsToMany('App\Models\Product', 'collection_products', 'collectId', 'productId');
    }

    public static function findCollect($dev, $collectType)
    {
    	$collect = Collection::where('ownerId', $dev)->where('collectType', $collectType)->select('collectId')->first();
    	return is_null($collect)? NULL: $collect;
    }


}
