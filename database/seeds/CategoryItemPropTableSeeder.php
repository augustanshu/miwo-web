<?php

use Illuminate\Database\Seeder;

class CategoryItemPropTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('category_item_props')->truncate();
        DB::table('category_item_props')->insert([
		[
		 'id'=>1,
		 'name'=>'品牌',
		 'parent_pid'=>0,
		 'parent_vid'=>0,
		 'is_key_prop'=>'0',
		 'is_erp'=>'1',
		 'is_must'=>'0',
		 'desc'=>'ERP品牌',
		 'is_enum_prop'=>'1',
		 'is_input_prop'=>'0',
		],
		 [
		 'id'=>2,
		 'name'=>'条形码',
		 'parent_pid'=>0,
		 'parent_vid'=>0,
		 'is_key_prop'=>'1',
		 'is_erp'=>'1',
		 'is_must'=>'1',
		 'desc'=>'ERP条形码',
		'is_enum_prop'=>'0',
		'is_input_prop'=>'0',
		],
		[
		 'id'=>3,
		 'name'=>'规格',
		 'parent_pid'=>0,
		 'parent_vid'=>0,
		 'is_key_prop'=>'0',
		 'is_erp'=>'1',
		 'is_must'=>'0',
		 'desc'=>'ERP',
		 'is_enum_prop'=>'0',
		 'is_input_prop'=>'0',
		],
		[
		 'id'=>4,
		 'name'=>'单位',
		 'parent_pid'=>0,
		 'parent_vid'=>0,
		 'is_key_prop'=>'0',
		 'is_erp'=>'1',
		 'is_must'=>'0',
		 'desc'=>'ERP单位',
		 'is_enum_prop'=>'1',
		 'is_input_prop'=>'0',
		],
		]);
    }
}
