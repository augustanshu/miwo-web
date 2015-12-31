<?php

use Illuminate\Database\Seeder;
use App\Models\Goods\GoodsClass;

class GoodsClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('goodsclasses')->delete();
	   for($i=0;$i<10;$i++){
		    GoodsClass::create([
			'name' =>'类'.$i,
			'type_id'=>$i,
			'type_name'=>' ',
			'parent_id'=>1,
			'order'=>0,
			'description'=>'',
			
	    ]);
	   }
    }
}
