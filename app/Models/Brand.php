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

    public static function moveImage($input)
    {
        $image = $input;
        $nameImage = time().'-'.$image->getClientOriginalName();
        $image->move(public_path().'/assets/image/', $nameImage);
        return $nameImage;
    }

    public static function add($input)
    {
        $brand = new Brand;
        $brand->brandId = uniqid(time(), true);
        $brand->brandName = $input['brandName'];
        $nameLogo = $brand->moveImage($input['brandLogoUrl']);
        $brand->brandLogoUrl = $nameLogo;
        $nameHeader = $brand->moveImage($input['brandHeaderUrl']);
        $brand->brandHeaderUrl = $nameHeader;
        $brand->save();
        return $brand;
    }



    public static function saveDB($input, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->brandName = $input['brandName'];
        
        if(isset($input['brandLogoUrl'])){
            unlink(public_path().'/assets/image/'.$brand->brandLogoUrl);
            $nameLogo = $brand->moveImage($input['brandLogoUrl']);
            $brand->brandLogoUrl = $nameLogo;
        }

        if(isset($input['brandHeaderUrl'])) {
            unlink(public_path().'/assets/image/'.$brand->brandHeaderUrl);
            $nameHeader = $brand->moveImage($input['brandHeaderUrl']);
            $brand->brandHeaderUrl = $nameHeader;
        }
        $brand->save();
        return $brand;
    }
}
