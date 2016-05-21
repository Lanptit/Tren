<?php

use Illuminate\Database\Seeder;
use App\Models\Product_Image;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->delete();
        $product_images_json = File::get('database/data/Tab-Product-Image.json');
        $product_images = json_decode($product_images_json);
        foreach ($product_images as $product_image) {
        	Product_Image::create([
        		'prodId'		=> $product_image->prodId,
        		'imageOrder'	=> $product_image->imageOrder,
        		'imageUrl'		=> $product_image->imageUrl
        	]);
        }
    }
}
