<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('products')->truncate();
        DB::table('products')->insert([
		[
		 'id'=>1,
		 'name'=>'测试商品1',
		 'price'=>'25.15',
		 'cid'=>19,
		 'code'=>'S12223',
		 'props'=>'5:1',
		 'input_pids'=>'2,3,4',
		 'input_str'=>'6244512,500ml',
		],
		
		[
		 'id'=>2,
		 'name'=>'测试商品2',
		 'price'=>'15.15',
		 'cid'=>20,
		 'code'=>'S12224',
		 'props'=>'5:2',
		 'input_pids'=>'2,3,4',
		 'input_str'=>'6244513,250只',
		]
		 #php artisan db:seed --class=ProductTableSeeder
		]);
    }
}
