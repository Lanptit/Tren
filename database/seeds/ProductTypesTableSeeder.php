<?php

use Illuminate\Database\Seeder;
use App\Models\Product_Type;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->delete();
        $product_types_json = File::get('database/data/Tab-Product-Type.json');
        $product_types = json_decode($product_types_json);
        foreach ($product_types as $product_type) {
        	Product_Type::create([
        		'typeId'		=> $product_type->typeId_crawled,
        		'typeName'		=> $product_type->typeName,
        		'typeImageUrl'	=> $product_type->typeImageUrl
        	]);
        }
    }
}
