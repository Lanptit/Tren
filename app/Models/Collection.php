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


    public static function saveProd($dev, $colname, $collectType)
    {
        $col = Collection::firstOrNew(array('collectName' => $colname, 'ownerId' => $dev));
        if(empty($col->collectId))
        {
            $col->collectId = uniqid(time(),true);
            $col->collectType = $collectType;
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

    public static function getProdInCollect($dev, $collectId)
    {
        // $prods = Collection::findOrFail($collectId)->products()->get();
        $col = Collection::findOrFail($collectId);
        // dump($col);
        $headerImageUrl = is_null($col['collectImage'])? get_image_size_url('https://i.ytimg.com/vi/-TpYOHh5wLY/maxresdefault.jpg') : get_image_size_url($col['collectImage']);
        $header = [
            'headerImageUrl'    => $headerImageUrl,
            'headerTitle'       => $col['collectName'],
            'headerSubTitle'    => 'Favorite collections for user '.$dev.', subtitle'
        ];

        $prods = $col->products()->get();
        $items = [];
        foreach ($prods as $prod) {
            $brandLogo = Brand::getBrandLogo($prod['tagBrand']);
            array_push($items, [
                'productId'         => $prod['prodId'],
                'productTitle'      => $prod['prodName'],
                'productSubTitle'   => $prod['prodName'],
                'productImageUrl'   => get_image_size_url($prod['prodImageUrl']),
                'brandName'         => $prod['tagBrand'],
                'brandLogo'         => $brandLogo,
                'productActionUrl'  => route('apiProdView').'?dev='.$dev.'&prod='.$prod['prodId'],
            ]);
        }
        return ['header' => $header, 'items' => $items];
    }

    public static function getAllFavorCol($dev)
    {
        $cols = Collection::where('ownerId', $dev)
                          ->whereIn('collectType', ['user/like', 'user/save'])->get();
        $data = [];
        foreach ($cols as $col) 
        {
            $prods = $col->products()->get();
            $imageUrlArray = [];
            foreach ($prods as $prod) 
            {
                array_push($imageUrlArray, get_image_size_url($prod['prodImageUrl']));
            }

            array_push($data, [
                'collectionId'          => $col['collectId'],
                'collectionName'        => $col['collectName'],
                'collectionType'        => $col['collectType'],
                'collectionActionUrl'   => route('viewOneCollect') . '?dev=' . $dev . '&col=' . $col['collectId'],
                'numberOfPhotos'        => count($prods),
                'imageUrlArray'         => $imageUrlArray
            ]);
        }
        return $data;
    }
}
