<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('brands')->insert([
	   
	   [
	       'id'=>'1',
		    'brand_name'=>'日本好饼干',
			'brand_initial'=>'RB',
	   ],
	   
	    [
	       'id'=>'2',
		    'brand_name'=>'台湾好面',
			'brand_initial'=>'TW',
	   ],
	   
	   ]);
    }
}
