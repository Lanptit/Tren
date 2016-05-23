<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'brandId';
    public $incrementing = false;
    protected $fillable = ['brandId', 'brandName', 'brandLogoUrl', 'brandHeaderUrl'];

    public static function getBrands()
    {
    	$brands = [
    				['rows' => [['J. Crew'], ['Gap',"Levi's"], ["J. Factory"], ["Club Monaco"]]], 
    				['rows' => [["Asos", "Diesel"], ["Urban Outfitters"], ["Topman"]]],
    				['rows'	=> [["Saint Laurent"], ["Kenzo", "Vince"], ["Tommy Hilfiger"]]]
    			];
    	return $brands;
    }

    public static function getBrandLogo($brandName)
    {
        $brandLogo = Brand::where('brandName', $brandName)->select('brandLogoUrl')->first();
        $brandLogoUrl = is_null($brandLogo)? '' : $brandLogo->brandLogoUrl;
        return $brandLogoUrl;
    }
}
