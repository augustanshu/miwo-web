<?php

use Illuminate\Database\Seeder;

class CategoryPropValueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('category_prop_values')->truncate();
        DB::table('category_prop_values')->insert([
		[
		 'id'=>1,
		 'name'=>'只',
		 'name_alias'=>'只',
		 'pid'=>5,
		 'is_parent'=>'0',
		  'modified_type'=>'modify',
		],
		 [
		 'id'=>2,
		 'name'=>'件',
		 'name_alias'=>'件',
		 'pid'=>5,
		 'is_parent'=>'0',
		  'modified_type'=>'modify',
		],
		 [
		 'id'=>3,
		 'name'=>'包',
		 'name_alias'=>'包',
		 'pid'=>5,
		 'is_parent'=>'0',
		  'modified_type'=>'modify',
		],
		 [
		 'id'=>4,
		 'name'=>'盒',
		 'name_alias'=>'盒',
		 'pid'=>5,
		 'is_parent'=>'0',
		  'modified_type'=>'modify',
		],
		 [
		 'id'=>5,
		 'name'=>'罐',
		 'name_alias'=>'罐',
		 'pid'=>5,
		 'is_parent'=>'0',
		  'modified_type'=>'modify',
		],
		[
		 'id'=>6,
		 'name'=>'瓶',
		 'name_alias'=>'瓶',
		 'pid'=>5,
		 'is_parent'=>'0',
		  'modified_type'=>'modify',
		],
		[
		 'id'=>7,
		 'name'=>'袋',
		 'name_alias'=>'袋',
		 'pid'=>5,
		 'is_parent'=>'0',
		  'modified_type'=>'modify',
		],
		]);
    }
}
