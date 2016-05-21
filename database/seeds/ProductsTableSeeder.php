<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        $prods_json = File::get("database/data/Tab-Product.json");
        $products = json_decode($prods_json);
        foreach ($products as $prod) {
        	Product::create(array(
        		'prodId'		=> $prod->prodId_crawled,
        		'prodName' 		=> $prod->prodName,
        		'prodPrice'		=> $prod->prodPrice,
        		'prodImageUrl'	=> $prod->prodImageUrl,
        		'prodDetailUrl'	=> $prod->prodDetailUrl,
        		'catalogUrl'	=> $prod->catalogUrl,
        		'tagWhat'		=> $prod->tagWhat,
        		'tagForWhom'	=> $prod->tagForWhom,
                'tagBrand'      => $prod->tagBrand,
        		'tagSupplier'	=> $prod->tagSupplier,
        		'tagPromotion'	=> $prod->tagPromotion,
        		'tagArrival'	=> $prod->tagArrival,
                'tagNavbar'     => $prod->tagNavbar,
                'tagNavbarUrl'  => $prod->tagNavbarUrl,
        	));	
        }
    }
}
