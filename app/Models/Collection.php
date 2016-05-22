<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';
    protected $primaryKey = 'collectId';
    public $incrementing = false;

    protected $fillable = ['collectId', 'collectName', 'collectImage', 'collectType', 'ownerId', 'ownerType', 'brandName', 'brandLogo'];

    public function products()
    {
    	return $this->belongsToMany('App\Models\Product', 'collection_products', 'collectId', 'productId');
    }

    public static function findCollect($dev, $collectType)
    {
    	$collect = Collection::where('ownerId', $dev)->where('collectType', $collectType)->select('collectId')->first();
    	return is_null($collect)? NULL: $collect;
    }


    public static function saveProd($dev, $colname)
    {
        $col = Collection::firstOrNew(array('collectName' => $colname, 'ownerId' => $dev));
        if(empty($col->collectId))
        {
            $col->collectId = uniqid(time(),true);
            $col->collectType = 'user/save';
            $col->ownerType = 'user';
            $col->save();
        }
        return $col->collectId;
    }

    public static function share($dev)
    {
        $col = Collection::firstOrNew(['ownerId' => $dev, 'collectType' => 'user/share']);
        if(empty($col->collectId)) {
            $col->collectId = uniqid(time(), true);
            $col->collectName = 'share';
            $col->ownerType = 'user';
            $col->save();
        }

        return $col->collectId;
    }
}
