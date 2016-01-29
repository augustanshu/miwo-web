<?php

use Illuminate\Database\Seeder;

class CategoryBindPropTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('category_bind_props')->truncate();
        DB::table('category_bind_props')->insert([
		[
		  'id'   =>1,
		  'cid'  =>19,
		  'props'=>'1;2;3;4;5',
		],
		[
		  'id'   =>2,
		  'cid'  =>20,
		  'props'=>'1;2;3;4;5',
		],
		[
		  'id'   =>3,
		  'cid'  =>21,
		  'props'=>'1;2;3;4;5',
		],
		[
		  'id'   =>4,
		  'cid'  =>22,
		  'props'=>'1;2;3;4;5',
		]
		]);
    }
}
