<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->delete();
        $brands_json = File::get('database/data/Tab-Brand.json');
        $brands = json_decode($brands_json);
        foreach ($brands as $brand) {
        	Brand::create([
        		'brandId'			=> $brand->brandId_crawled,
        		'brandName'			=> $brand->brandName,
        		'brandLogoUrl'		=> $brand->brandLogoUrl,
        		'brandHeaderUrl'	=> $brand->brandHeaderUrl
        	]);
        }
    }
}
