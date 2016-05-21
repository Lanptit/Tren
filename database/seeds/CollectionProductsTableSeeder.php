<?php

use Illuminate\Database\Seeder;
use App\Models\Collection_Product;

class CollectionProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collection_products')->delete();
        $collection_products_json = File::get('database/data/Tab-Collection-Product.json');
        $collection_products = json_decode($collection_products_json);
        foreach ($collection_products as $collection_product) {
        	Collection_Product::create([
        		'collectId'		=> $collection_product->collectId_crawled,
        		'productId'		=> $collection_product->productId_crawled,
        	]);
        }
        
    }
}
