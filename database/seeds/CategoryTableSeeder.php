<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
	   [
	     'name'          =>'大类',
		 'parent_id'     =>'0',
		 'order'         =>'0',		 
	   ],
	    [
	     'name'          =>'数码办公',
		 'parent_id'     =>'1',
		 'order'         =>'1',		 
	   ],
	    [
	     'name'          =>'特产食品',
		 'parent_id'     =>'1',
		 'order'         =>'0',		 
	   ],
	    [
	     'name'          =>'居家生活',
		 'parent_id'     =>'1',
		 'order'         =>'2',		 
	   ],
	   [
	     'name'          =>'生活健康',
		 'parent_id'     =>'1',
		 'order'         =>'3',		 
	   ],
	    [
	     'name'          =>'母婴用品',
		 'parent_id'     =>'1',
		 'order'         =>'4',		 
	   ],
	    [
	     'name'          =>'鞋帽服饰',
		 'parent_id'     =>'1',
		 'order'         =>'5',		 
	   ],
	   [
	     'name'          =>'美容珠宝',
		 'parent_id'     =>'1',
		 'order'         =>'6',		 
	   ],
	    [
	     'name'          =>'虚拟充值',
		 'parent_id'     =>'1',
		 'order'         =>'7',		 
	   ],
	   [
	     'name'          =>'虚拟充值',
		 'parent_id'     =>'1',
		 'order'         =>'7',		 
	   ],
	   [
	     'name'          =>'进口食品',
		 'parent_id'     =>'3',
		 'order'         =>'0',		 
	   ],
	   [
	     'name'          =>'地方特产',
		 'parent_id'     =>'3',
		 'order'         =>'1',		 
	   ],
	    [
	     'name'          =>'休闲食品',
		 'parent_id'     =>'3',
		 'order'         =>'2',		 
	   ],
	   [
	     'name'          =>'粮油调味',
		 'parent_id'     =>'3',
		 'order'         =>'3',		 
	   ],
	   [
	     'name'          =>'中外名酒',
		 'parent_id'     =>'3',
		 'order'         =>'4',		 
	   ],
	   [
	     'name'          =>'饮料冲调',
		 'parent_id'     =>'3',
		 'order'         =>'5',		 
	   ],
	   [
	     'name'          =>'营养健康',
		 'parent_id'     =>'3',
		 'order'         =>'6',		 
	   ],
	   [
	     'name'          =>'生鲜食品',
		 'parent_id'     =>'3',
		 'order'         =>'7',		 
	   ],
	   [
	     'name'          =>'健康礼品',
		 'parent_id'     =>'3',
		 'order'         =>'8',		 
	   ],
	   [
	     'name'          =>'饼干蛋糕',
		 'parent_id'     =>'11',
		 'order'         =>'0',		 
	   ],
	   [
	     'name'          =>'休闲零食',
		 'parent_id'     =>'11',
		 'order'         =>'0',		 
	   ],
	   [
	     'name'          =>'糖果巧克力',
		 'parent_id'     =>'11',
		 'order'         =>'0',		 
	   ],
	   [
	     'name'          =>'冲调饮品',
		 'parent_id'     =>'11',
		 'order'         =>'0',		 
	   ],
	   [
	     'name'          =>'粮油调味',
		 'parent_id'     =>'11',
		 'order'         =>'0',		 
	   ],
	   ]);
    }
}
