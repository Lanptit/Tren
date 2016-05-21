<?php

use Illuminate\Database\Seeder;
use App\Models\Collection;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collections')->delete();
        $collects_json = File::get('database/data/Tab-Collection.json');
        $collections = json_decode($collects_json);
        foreach ($collections as $collect) {
        	Collection::create([
        		'collectId'		=> $collect->collectId_crawled,
        		'collectName'	=> $collect->collectName,
        		'collectImage'	=> $collect->collectImage,
        		'collectType'	=> $collect->collectType,
        		'ownerId'		=> $collect->ownerId_crawled,
        		'ownerType' 	=> $collect->ownerType,
        		'brandName'		=> $collect->brandName,
        		'brandLogo'		=> $collect->brandLogo
        	]);
        }
    }
}
